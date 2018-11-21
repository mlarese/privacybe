<?php

namespace App\Service;

use App\Entity\Privacy\Privacy as PrivacyEntity;
use App\Exception\ImportException;
use App\Entity\Upgrade\SubscriberDomainPath;
use App\Resource\MailOneDirectExport;
use App\Resource\PrivacyResource;
use Doctrine\ORM\EntityManager;

class MailOneNewsletter {

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em = null;

    /**
     * Import from pre-DataONE service
     *
     * @param $ownerId
     * @param $termId
     * @param $hostname
     * @param $dbName
     * @param $username
     * @param $password
     * @param $listId
     * @param $domain
     * @param $language
     * @throws ImportException
     * @throws \Doctrine\DBAL\DBALException Questo è solo un wrapper per il codice scritto a livello di controller del comando della console.
     * Dovrebbe essere tutto refattorizzato
     */
    public function import (
        $ownerId,
        $termId,
        $hostname,
        $dbName,
        $username,
        $password,
        $listId,
        $domain,
        $language
    ) {

        // Filter input values
        if (!is_array($listId)) {
            $listId = [(int)$listId];
        }
        $this->validateArguments($ownerId, $termId, $hostname, $username, $password, $dbName, $listId, $domain, $language);

        // @todo creare helper con autoloader per prender il file di configurazione
        $configFile = realpath(__DIR__ . '/../../settings.php');
        $settings = require $configFile;
        $config = new \Doctrine\DBAL\Configuration();

        $connectionParams = array(
            'dbname' => $dbName,
            'user' => $username,
            'password' => $password,
            'host' => $hostname,
            'driver' => 'pdo_mysql',
        );

        $conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
        $conn->connect();

        if($conn->isConnected())
        {
            $limitDate = mktime(0, 0, 0, 05, 25, 2018);

            /**
             * @var $privacy EntityManager
             */
            $privacy = $this->getPrivacyDb($settings['settings'], $ownerId);

            $term = $privacy->getRepository('App\Entity\Privacy\Term')->findOneByUid($termId);
            $termParagraphs = $term->getParagraphs();
            // TODO: effettuare controlli sulla corretta esistenza di $termParagraphs (e che siano composti come ce li aspettiamo)

            $date = new \DateTime();

            $importEmailList = array();
            $alredyExistsEmail = array();
            $errorImport = array();

            foreach ($listId as $singleId)
            {
                $prRes = new PrivacyResource($privacy);

                $query = 'SELECT * FROM email_list_subscribers 
                          WHERE listid = '.$singleId.' 
                          AND subscribedate < '.$limitDate.' 
                          AND unsubscribeconfirmed = 0  and bounced=0';

                $state = $conn->executeQuery($query);
                $result = $state->fetchAll();

                if($result && !empty($result))
                {
                    $i = 0;
                    $countImport = 0;
                    $countExists = 0;
                    $countError = 0;
                    $tmpError = array();

                    foreach ($result as $newsletteretails)
                    {
                        $email = $newsletteretails['emailaddress'];
                        $checkEmailExists = $privacy->getRepository('App\Entity\Privacy\Privacy')->findByEmail($email);

                        if($i == 1000)
                        {
                            $prRes->EMClear();
                        }

                        // Se non è già presente la mail nel DB aggiungo il record
                        if(empty($checkEmailExists))
                        {
                            $name = '';
                            $surname = '';
                            $userLang = $language;
                            $phone = '';
                            $mobile = '';

                            $queryData = "SELECT esd.*, ec.name as fieldName FROM email_subscribers_data as esd
                                        inner join email_list_subscribers as els on esd.subscriberid = els.subscriberid 
                                        inner join email_customfields as ec on ec.fieldid = esd.fieldid
                                        where els.subscriberid = ".$newsletteretails['subscriberid']." 
                                        and esd.data != '' 
                                        and ec.name in ('lingua', 'language', 'lang', 'nome', 'name', 'cognome', 'surname', 'telefono', 'mobile', 'phone', 'telephone', 'cell phone'); ";

                            $stateData = $conn->executeQuery($queryData);
                            $resultData = $stateData->fetchAll();

                            if($resultData && !empty($resultData))
                            {
                                foreach ($resultData as $subsciberData)
                                {
                                    $subsciberData['fieldName'] = strtolower($subsciberData['fieldName']);
                                    if($subsciberData['fieldName'] == 'lingua' || $subsciberData['fieldName'] == 'language' || $subsciberData['fieldName'] == 'lang')
                                    {
                                        $userLang = strtolower($subsciberData['data']);
                                    }
                                    elseif($subsciberData['fieldName'] == 'nome' || $subsciberData['fieldName'] == 'name')
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

                            if(strlen($userLang) > 2)
                            {
                                switch ($userLang) {
                                    case 'ita':
                                        $userLang = 'it';
                                        break;
                                    case 'eng':
                                        $userLang = 'en';
                                        break;
                                    case 'deu':
                                        $userLang = 'de';
                                        break;
                                    case 'fra':
                                        $userLang = 'fr';
                                        break;
                                    case 'rus':
                                        $userLang = 'ru';
                                        break;
                                    default:
                                        $userLang = 'en';
                                }
                            }

                            $uid = $newsletteretails['subscriberid'].'-'.microtime(true);
                            $ref = 'import-nl-mailone-console-' . $date->format('YMDHm');
                            $ip = ($newsletteretails['requestip'] != '' && !is_null($newsletteretails['requestip'])) ? $newsletteretails['requestip'] : '';
                            $form = [
                                'id' => $newsletteretails['subscriberid'],
                                'email' => $email,
                                'original_ip' => [],
                                'title' => [],
                                'name' => $name,
                                'surname' => $surname,
                                'phone' => $mobile,
                                'mobile' => $phone,
                                'fax' => [],
                                'city' => [],
                                'language' => $userLang,
                                'zipcode' => [],
                                'nation' => [],
                                'birth date' => [],
                                'ip' => $ip,
                                'iso2language' => $userLang,
                                'subscribeurl' => $domain,
                                'privacy' => ($termParagraphs[0]['text'][$userLang] ? $termParagraphs[0]['text'][$userLang] : $termParagraphs[0]['text']['en'])
                            ];

                            $flags = array(
                                array(
                                    'code' => 'dati_personali',
                                    'selected' => false,
                                    'mandatory' => false,
                                    'text' => 'acconsento'
                                ),
                                array(
                                    'code' => 'newsletter',
                                    'selected' => false,
                                    'mandatory' => false,
                                    'text' => 'acconsento'
                                )
                            );

                            if(isset($termParagraphs[0]['treatments']) && !empty($termParagraphs[0]['treatments']))
                            {
                                $flags = array(
                                    array(
                                        'code' => $termParagraphs[0]['treatments'][0]['name'],
                                        'selected' => $termParagraphs[0]['treatments'][0]['restrictive'],
                                        'mandatory' => $termParagraphs[0]['treatments'][0]['mandatory'],
                                        'text' => (!empty($termParagraphs[0]['treatments'][0]['text'][$userLang]) ? $termParagraphs[0]['treatments'][0]['text'][$userLang] : $termParagraphs[0]['treatments'][0]['text']['en'])
                                    ),
                                    array(
                                        'code' => $termParagraphs[0]['treatments'][1]['name'],
                                        'selected' => $termParagraphs[0]['treatments'][1]['restrictive'],
                                        'mandatory' => $termParagraphs[0]['treatments'][1]['mandatory'],
                                        'text' => (!empty($termParagraphs[0]['treatments'][1]['text'][$userLang]) ? $termParagraphs[0]['treatments'][1]['text'][$userLang] : $termParagraphs[0]['treatments'][1]['text']['en'])
                                    )
                                );
                            }

                            $privacydata = array(
                                "referrer" => $domain,
                                "ownerId" =>$ownerId,
                                "termId" => $termId,
                                "language" => $language,
                                "name" => $term->getName(),
                                "paragraphs" => array(
                                    array(
                                        "text" => ($termParagraphs[0]['text'][$userLang] ? $termParagraphs[0]['text'][$userLang] : $termParagraphs[0]['text']['en']),
                                        "title" => ($termParagraphs[0]['title'][$userLang] ? $termParagraphs[0]['title'][$userLang] : $termParagraphs[0]['title']['en']),
                                        "treatments" => $flags
                                    )/*,
                                array(
                                    "text" => ($termParagraphs[1]['text'][$userLang] ? $termParagraphs[1]['text'][$userLang] : $termParagraphs[1]['text']['en']),
                                    "title" => ($termParagraphs[1]['title'][$userLang] ? $termParagraphs[1]['title'][$userLang] : $termParagraphs[1]['title']['en']),
                                    "treatments" => $flags
                                )*/ // NOTA: da scommentare nel caso si voglia mettere il paragrafo sia per la privacy sia per la newsletter
                                ),
                            );
                            $site = '';
                            try{
                                $pr = $prRes->savePrivacy(
                                    $ip,
                                    $form,
                                    '',
                                    $name,
                                    $surname,
                                    $termId,
                                    $site,
                                    $privacydata,
                                    $uid,
                                    $ref,
                                    str_replace(array('https://', 'http://'), '', $domain),
                                    $email,
                                    $flags,
                                    ($phone != '' ? $phone : ($mobile != '' ? $mobile : '')),
                                    $userLang,
                                    null,
                                    true
                                );

                                if($pr)
                                {
                                    echo '.';
                                    $countImport++;
                                }
                                else
                                {
                                    echo 'Entity manager connection close!!<br>';
                                    break;
                                }
                            } catch (\Exception $e) {
                                echo "!(".$e->getMessage().")";
                                $countError++;
                                $tmpError[] = $e->getMessage();
                                //echo $e->getMessage(); die;
                            }
                        }
                        else
                        {
                            echo ':';
                            $countExists++;
                        }

                        $i++;
                    }
                }
                else
                {
                    $message = 'List empty or not found!';
                    $qList = 'SELECT name FROM email_lists 
                          WHERE listid = '.$singleId;

                    $state = $conn->executeQuery($qList);
                    $result = $state->fetchAll();

                    if($result && !empty($result))
                    {
                        $message = "'".$result[0]['name']."' ".strtolower($message);
                    }
                    else
                    {
                        $message = 'List with listid '.$singleId.' empty or not found!';
                    }

                    echo " ** ".$message." ** ";
                }

                $importEmailList[] = " - ".$countImport." contacts imported for list ID ".$singleId." - ";
                if($countExists > 0)
                {
                    $alredyExistsEmail[] = " - ".$countExists." existing contacts in dataone for list ID ".$singleId." - ";
                }
                if(!empty($tmpError))
                {
                    $errorImport[] = " - ".$countError." errors during contacts importation for list ID ".$singleId.": ".implode(", ", $tmpError)." - ";
                }
            }

            echo implode(";<br>", $importEmailList);

            if(!empty($alredyExistsEmail))
            {
                echo implode(";<br>", $alredyExistsEmail);
            }

            if(!empty($errorImport))
            {
                echo implode(";<br>", $errorImport);
            }
        }
        else
        {
            echo $conn->errorInfo();
        }
        $conn->close();
    }

    /**
     * @param $ownerId
     * @param $termId
     * @param $hostname
     * @param $username
     * @param $password
     * @param $dbname
     * @param $listId
     * @param $domain
     * @param $lang
     * @return bool
     * @throws ImportException
     */
    private function validateArguments($ownerId, $termId, $hostname, $username, $password, $dbname, $listId, $domain, $lang)
    {
        $error = array();

        if (empty($ownerId) ||
            $ownerId <= 0
        ) {
            throw new ImportException(sprintf(
                'Owner ID must be an integer greater than zero'
            ));
        }
        $ownerId = (int)$ownerId;

        if($ownerId < 1)
        {
            throw new ImportException('Incorrect OwnerId; the value must be greater than 0');
        }

        if(!is_string($termId) || $termId == '')
        {
            throw new ImportException('TermId incorrect or empty; enter a correct value');
        }

        if(!is_string($hostname) || $hostname == '')
        {
            throw new ImportException('Hostname incorrect or empty; enter a correct value');
        }

        if(!is_string($username) || $username == '')
        {
            throw new ImportException('Username incorrect or empty; enter a correct value');
        }

        if(!is_string($password) || $password == '')
        {
            throw new ImportException('Password incorrect or empty; enter a correct value');
        }

        if(!is_string($dbname) || $dbname == '')
        {
            throw new ImportException('DB name incorrect or empty; enter a correct value');
        }

        if(is_array($listId) && !empty($listId))
        {
            $listError = false;
            foreach ($listId as $valId)
            {
                if(intval($valId) < 1)
                {
                    $listError = true;
                }
            }

            if($listError)
            {
                throw new ImportException('the id of the list must be greater than 0');
            }
        }
        else
        {
            throw new ImportException('At least one id must have been passed');
        }

        if(!is_string($domain) || $domain == '')
        {
            throw new ImportException('Domain incorrect or empty; enter a correct value');
        }
        else
        {
            $checkDoamin = filter_var($domain, FILTER_VALIDATE_URL);

            if(!$checkDoamin)
            {
                throw new ImportException('Mandatory protocol');
            }
        }

        if(!is_string($lang) || $lang == '')
        {
            throw new ImportException('Language incorrect or empty; enter a correct value');
        }
        elseif(strlen($lang) != 2)
        {
            throw new ImportException('The language must be in ISO2 format');
        }

        if(!empty($error))
        {
            $message = 'The past parameters are wrong: '.implode(', ', $error).'.';
            throw new ImportException($message);
        }
    }


    // TODO: è stato creato l'helper App\Helpers\PrivacyHelper con questa funzione. Sostiture la chiamata a questa funzione in questa classe con l'helper e testare che il funzionamento sia lo stesso
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
}