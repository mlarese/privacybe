<?php

namespace App\Service;

use App\Entity\Privacy\Privacy as PrivacyEntity;
use App\Exception\ImportException;
use App\Entity\Upgrade\SubscriberDomainPath;
use App\Resource\MailOneDirectExport;
use App\Resource\PrivacyResource;
use Doctrine\ORM\EntityManager;

class DataOneUpgrade {

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em = null;

    /**
     * Import from pre-DataONE service
     *
     * @param $ownerId
     * @param $termId
     * @param $hostName
     * @param $dbName
     * @param $userName
     * @param $password
     * @param $domain
     * @throws ImportException
     * @throws \Doctrine\DBAL\DBALException
     *
     * Questo è solo un wrapper per il codice scritto a livello di controller del comando della console.
     * Dovrebbe essere tutto refattorizzato
     */
    public function import (
        $ownerId,
        $termId,
        $hostName,
        $dbName,
        $userName,
        $password,
        $domain
    ) {

        // Filter input values
        if (empty($ownerId) ||
            $ownerId <= 0
        ) {
            throw new ImportException(sprintf(
                'Owner ID must be an integer greater than zero'
            ));
        }
        $ownerId = (int)$ownerId;

        // @todo creare helper con autoloader per prender il file di configurazione
        $configFile = realpath(__DIR__ . '/../../settings.php');
        $settings = require $configFile;

        if ($ownerId > 0 && $domain > 0 && $termId != '') {
            /**
             * @var $upgrade EntityManager
             */
            $upgrade = $this->getUpgradeDb($settings['settings']);

            $repository = $upgrade->getRepository(SubscriberDomainPath::class)->findBy(array('domainpath' => $domain, 'status' => 1));

            $emailList = array();
            /**
             * @var $value SubscriberDomainPath
             */
            foreach ($repository as $value) {
                try {
                    $json = json_decode($value->getDomainpath()->getPath(), true);
                    if (!$json) {
                        $json = $value->getDomainpath()->getPath();
                    } else {
                        $lg = $value->getLanguage();
                        $json = $json[$lg];
                    }
                } catch (\Exception $e) {
                    $json = $value->getDomainpath()->getPath();
                }
                try {
                    $jsonprivacy = json_decode($value->getPrivacydisclaimer()->getPrivacy(), true);
                    if (!$jsonprivacy) {
                        $jsonprivacy = $value->getPrivacydisclaimer()->getPrivacy();
                    } else {
                        $lg = $value->getLanguage();
                        $jsonprivacy = $jsonprivacy[$lg];
                    }
                } catch (\Exception $e) {
                    $jsonprivacy = $value->getPrivacydisclaimer()->getPrivacy();
                }


                $emailList[] = array('email' => $value->getEmail(), 'ip' => $value->getIp(), 'language' => $value->getLanguage(), 'url' => $json,'privacy'=>$jsonprivacy);

            }


            $repository = null;

            if ($emailList && !empty($emailList) ) {


                /**
                 * @var $config EntityManager
                 */
                $config = $this->getConfigDb($settings['settings']);


                $users = array();

                $objMailOne = new MailOneDirectExport();
                $objMailOne->setEntityManager($config);
                $objMailOne->setOwner($ownerId);

                $objMailOne->setAction("list");

                $config = new \Doctrine\DBAL\Configuration();

                $connectionParams = array(
                    'dbname' => $dbName,
                    'user' => $userName,
                    'password' => $password,
                    'host' => $hostName,
                    'driver' => 'pdo_mysql',
                );

                $conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
                $conn->connect();

                $response = $objMailOne->export();
                if ($response && is_array($response)) {
                    foreach ($emailList as $contact) {
                        $name = '';
                        $surname = '';
                        $phone = '';
                        $mobile = '';
                        $subscriberId = '';
                        $detail = array();

                        if($name == '' && $surname == '')
                        {
                            foreach ($response as $listVal) {
                                $query = 'SELECT * FROM email_list_subscribers 
                                          WHERE listid = '.$listVal['id'].' 
                                          AND emailaddress = \''.$contact['email'].'\' 
                                          AND unsubscribeconfirmed = 0';

                                $state = $conn->executeQuery($query);
                                $result = $state->fetchAll();
                                if(!empty($result)) {
                                    $subscriberId = $result[0]['subscriberid'];
                                    $queryData = "SELECT esd.*, ec.name as fieldName FROM email_subscribers_data as esd
                                            inner join email_list_subscribers as els on esd.subscriberid = els.subscriberid 
                                            inner join email_customfields as ec on ec.fieldid = esd.fieldid
                                            where els.subscriberid = ".$subscriberId." 
                                            and esd.data != '' 
                                            and ec.name in ('nome', 'name', 'cognome', 'surname', 'telefono', 'mobile', 'phone', 'telephone', 'cell phone'); ";

                                    $stateData = $conn->executeQuery($queryData);
                                    $resultData = $stateData->fetchAll();

                                    if($resultData && !empty($resultData))
                                    {
                                        foreach ($resultData as $subsciberData)
                                        {
                                            $subsciberData['fieldName'] = strtolower($subsciberData['fieldName']);
                                            if($subsciberData['fieldName'] == 'nome' || $subsciberData['fieldName'] == 'name')
                                            {
                                                $name = utf8_encode($subsciberData['data']);
                                            }
                                            elseif($subsciberData['fieldName'] == 'cognome' || $subsciberData['fieldName'] == 'surname')
                                            {
                                                $surname = utf8_encode($subsciberData['data']);
                                            }
                                            elseif ($subsciberData['fieldName'] == 'telefono' || $subsciberData['fieldName'] == 'phone' || $subsciberData['fieldName'] == 'telephone')
                                            {
                                                $phone = utf8_encode($subsciberData['data']);
                                            }
                                            elseif ($subsciberData['fieldName'] == 'mobile' || $subsciberData['fieldName'] == 'cell phone')
                                            {
                                                $mobile = utf8_encode($subsciberData['data']);
                                            }
                                        }
                                    }
                                }

                                if($name != '' && $surname != '')
                                {
                                    break;
                                }
                            }
                        }

                        $detail['id'] = $subscriberId;
                        $detail['email'] = $contact['email'];
                        $detail['name'] = $name;
                        $detail['surname'] = $surname;
                        $detail['phone'] = $phone;
                        $detail['mobile'] = $mobile;
                        $detail['ip'] = $contact['ip'];
                        $detail['iso2language'] = $contact['language'];
                        $detail['subscribeurl'] = $contact['url'];
                        $detail['privacy'] = $contact['privacy'];
                        $users[$contact['email']] = $detail;
                    }
                }

                /* if ($response && is_array($response)) {
                     foreach ($emailList as $contact) {
                         if (isset($response[$contact['email']])) {
                             $objMailOne->setAction("subscriber");
                             echo 1;
                             $detail = $objMailOne->export($response[$contact['email']]['id'], $response[$contact['email']]['list']);

                             print_r($detail);
                             die;
                             if ($detail && isset($detail['id'])) {
                                 $detail['ip'] = $contact['ip'];
                                 $detail['iso2language'] = $contact['language'];
                                 $detail['subscribeurl'] = $contact['url'];
                                 $detail['privacy'] = $contact['privacy'];

                                 $users[$contact['email']] = $detail;

                             }
                         }
                     }
                 }*/

                /**
                 * @var $privacy EntityManager
                 */
                $privacy = $this->getPrivacyDb($settings['settings'], $ownerId);

                $term = $privacy->getRepository('App\Entity\Privacy\Term')->findOneByUid($termId);
                $termParagraphs = $term->getParagraphs();
                $date = new \DateTime();
                $i = 0;
                foreach ($users as $detail) {
                    $userLang = strtolower($detail['iso2language']);
                    $prRes = new PrivacyResource($privacy);

                    if($i == 1000)
                    {
                        $prRes->EMClear();
                    }

                    $url = parse_url(  $detail['subscribeurl']);
                    if(!$url || !isset( $url['host'])) continue;

                    $form = [
                        'id' => $detail['id'],
                        'email' => $detail['email'],
                        'original_ip' => [],
                        'title' => [],
                        'name' => $detail['name'],
                        'surname' => $detail['surname'],
                        'phone' => $detail['mobile'],
                        'mobile' => $detail['phone'],
                        'fax' => [],
                        'city' => [],
                        'language' => $detail['iso2language'],
                        'zipcode' => [],
                        'nation' => [],
                        'birth date' => [],
                        'ip' => $detail['ip'],
                        'iso2language' => $detail['iso2language'],
                        'subscribeurl' => $detail['subscribeurl'],
                        'privacy' => $detail['privacy']
                    ];

                    $flags = array(
                        array(
                            'code' => 'dati_personali',
                            'selected' => true,
                            'mandatory' => true,
                            'text' => 'acconsento'
                        ),
                        array(
                            'code' => 'newsletter',
                            'selected' => true,
                            'mandatory' => false,
                            'text' => 'acconsento'
                        )
                    );

                    if(isset($termParagraphs[0]['treatments']) && !empty($termParagraphs[0]['treatments']))
                    {
                        $flags = array(
                            array(
                                'code' => $termParagraphs[0]['treatments'][0]['name'],
                                'selected' => true,
                                'mandatory' => $termParagraphs[0]['treatments'][0]['mandatory'],
                                'text' => (!empty($termParagraphs[0]['treatments'][0]['text'][$userLang]) ? $termParagraphs[0]['treatments'][0]['text'][$userLang] : $termParagraphs[0]['treatments'][0]['text']['en'])
                            ),
                            array(
                                'code' => $termParagraphs[0]['treatments'][1]['name'],
                                'selected' => true,
                                'mandatory' => $termParagraphs[0]['treatments'][1]['mandatory'],
                                'text' => (!empty($termParagraphs[0]['treatments'][1]['text'][$userLang]) ? $termParagraphs[0]['treatments'][1]['text'][$userLang] : $termParagraphs[0]['treatments'][1]['text']['en'])
                            )
                        );
                    }

                    $privacydata = array(
                        "referrer" => $detail['subscribeurl'],
                        "ownerId" =>$ownerId,
                        "termId" => $termId,
                        "language" => $userLang,
                        "name" => $term->getName(),
                        "paragraphs" => array(
                            array(
                                "text" => ($termParagraphs[0]['text'][$userLang] ? $termParagraphs[0]['text'][$userLang] : $termParagraphs[0]['text']['en']),
                                "title" => ($termParagraphs[0]['title'][$userLang] ? $termParagraphs[0]['title'][$userLang] : $termParagraphs[0]['title']['en']),
                                "treatments" => $flags
                            )),

                    );

                    try{
                        $pr = $prRes->savePrivacy(
                            $detail['ip'],
                            $form,
                            '',
                            $detail['name']===null?'':(is_array($detail['name'])?'':$detail['name']),
                            $detail['surname']===null?'':(is_array($detail['surname'])?'':$detail['surname']),
                            $termId,
                            $url['path'],
                            $privacydata,
                            $detail['id'].'-'.microtime(true),
                            'import-console-' . $date->format('YMDHm'),
                            $url['host'],
                            $detail['email'],
                            $flags,
                            isset($detail['mobile']) ? $detail['mobile'] : isset($detail['phone']) ? $detail['phone'] : '',
                            $detail['iso2language'],
                            null,
                            true
                        );

                        if($pr)
                        {
                            echo '.';
                        }
                        else
                        {
                            echo 'Entity manager connection close!!<br>';
                            break;
                        }
                    } catch (\Exception $e) {
                        echo "!";
                    }

                    $i++;
                }
            }
        }
    }

    private function getConfigDb($settings)
    {
        $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
            $settings['doctrine_config']['meta']['entity_path'],
            $settings['doctrine_config']['meta']['auto_generate_proxies'],
            $settings['doctrine_config']['meta']['proxy_dir'],
            $settings['doctrine_config']['meta']['cache'],
            false
        );

        $subscriber = new \App\DoctrineEncrypt\Subscribers\DoctrineEncryptSubscriber(
            new \Doctrine\Common\Annotations\AnnotationReader(),
            new \App\DoctrineEncrypt\Encryptors\OpenSslEncryptor($settings['doctrine_privacy']['encryption_key'])
        );
        $em = \Doctrine\ORM\EntityManager::create($settings['doctrine_config']['connection'], $config);
        $eventManager = $em->getEventManager();
        $eventManager->addEventSubscriber($subscriber);

        return $em;
    }

    private function getPrivacyDb($settings, $ownerId)
    {

        $dynaDb = $settings['doctrine_privacy']['dynamic_db'];

        $db = $dynaDb['db'] . "_$ownerId";
        $user = $dynaDb['user'] . "_$ownerId";
        $password = md5($dynaDb['password'] . "Fx8k_${ownerId}_5tFg");


        $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
            $settings['doctrine_privacy']['meta']['entity_path'],
            $settings['doctrine_privacy']['meta']['auto_generate_proxies'],
            $settings['doctrine_privacy']['meta']['proxy_dir'],
            $settings['doctrine_privacy']['meta']['cache'],
            false
        );

        $connection = array(
            'driver' => $settings['doctrine_privacy']['connection']['driver'],
            'host' => $settings['doctrine_privacy']['connection']['host'],
            'dbname' => $db,
            'user' => $user,
            'password' => $password
        );


        $em = \Doctrine\ORM\EntityManager::create($connection, $config);

        $subscriber = new \App\DoctrineEncrypt\Subscribers\DoctrineEncryptSubscriber(
            new \Doctrine\Common\Annotations\AnnotationReader(),
            new \App\DoctrineEncrypt\Encryptors\OpenSslEncryptor($settings['doctrine_privacy']['encryption_key'])
        );

        $eventManager = $em->getEventManager();
        $eventManager->addEventSubscriber($subscriber);

        return $em;
    }

    private function getUpgradeDb($settings)
    {

        $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
            $settings['doctrine_upgrade']['meta']['entity_path'],
            $settings['doctrine_upgrade']['meta']['auto_generate_proxies'],
            $settings['doctrine_upgrade']['meta']['proxy_dir'],
            $settings['doctrine_upgrade']['meta']['cache'],
            false
        );

        $subscriber = new \App\DoctrineEncrypt\Subscribers\DoctrineEncryptSubscriber(
            new \Doctrine\Common\Annotations\AnnotationReader(),
            new \App\DoctrineEncrypt\Encryptors\OpenSslEncryptor($settings['doctrine_privacy']['encryption_key'])
        );
        $em = \Doctrine\ORM\EntityManager::create($settings['doctrine_upgrade']['connection'], $config);
        $eventManager = $em->getEventManager();
        $eventManager->addEventSubscriber($subscriber);

        return $em;
    }
}