<?php

namespace Console\Command;

use App\Entity\Upgrade\SubscriberDomainPath;
use App\Resource\MailOneDirectExport;
use App\Resource\PrivacyResource;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Console\Helper\Log as LogHelper;
use App\DoctrineEncrypt\Configuration\Encrypted;


require realpath(__DIR__.'/../../DoctrineEncrypt/Configuration/Encrypted.php');

class ImportUpgrade extends Base
{
    protected function configure()
    {
        $this->setName('import:privacy')
            ->setDescription('Import data from a domain')
            ->addArgument(
                'domain',
                InputArgument::REQUIRED,
                'select the domain'
            )->addArgument(
                'owner',
                InputArgument::REQUIRED,
                'select the destination owner'
            )->addArgument(
                'termId',
                InputArgument::REQUIRED,
                'Term Id'
            );;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $configFile = realpath(__DIR__ . '/../../../settings.php');

        $settings = require $configFile;


        $upgradedomain = $input->getArgument('domain');

        $ownerdomain = $input->getArgument('owner');

        $termId = $input->getArgument('termId');

        if ($ownerdomain > 0 && $upgradedomain > 0 && $termId != '') {
            /**
             * @var $upgrade EntityManager
             */
            $upgrade = $this->getUpgradeDb($settings['settings']);

            $repository = $upgrade->getRepository(SubscriberDomainPath::class)->findBy(array('domainpath' => $upgradedomain, 'status' => 1));

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
                $objMailOne->setOwner($ownerdomain);
                $objMailOne->setAction("dump");


                $response = $objMailOne->export(-1);
                if ($response && is_array($response)) {
                    foreach ($emailList as $contact) {
                        if (isset($response[$contact['email']])) {
                            $objMailOne->setAction("subscriber");
                            $detail = $objMailOne->export($response[$contact['email']]['id'], $response[$contact['email']]['list']);
                            if ($detail && isset($detail['id'])) {
                                $detail['ip'] = $contact['ip'];
                                $detail['iso2language'] = $contact['language'];
                                $detail['subscribeurl'] = $contact['url'];
                                $detail['privacy'] = $contact['privacy'];

                                $users[$contact['email']] = $detail;

                            }
                        }
                    }
                }


                /**
                 * @var $privacy EntityManager
                 */
                $privacy = $this->getPrivacyDb($settings['settings'], $ownerdomain);

                $term = $privacy->getRepository('App\Entity\Privacy\Term')->findOneByUid($termId);
                $termParagraphs = $term->getParagraphs();

                $date = new \DateTime();
                foreach ($users as $detail) {
                    $userLang = strtolower($detail['iso2language']);
                    $prRes = new PrivacyResource($privacy);

                    $url = parse_url(  $detail['subscribeurl']);
                    if(!$url || !isset( $url['host'])) continue;

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
                        "ownerId" =>$ownerdomain,
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

                    $pr = $prRes->savePrivacy(
                        $detail['ip'],
                        $detail,
                        '',
                        $detail['name']===null?'':(is_array($detail['name'])?'':$detail['name']),
                        $detail['surname']===null?'':(is_array($detail['surname'])?'':$detail['surname']),
                        $termId,
                        $url['path'],
                        $privacydata,
                        $detail['id'],
                        'import-console-' . $date->format('YMDHm'),
                        $url['host'],
                        $detail['email'],
                        $flags
                        ,
                        isset($detail['mobile']) ? $detail['mobile'] : isset($detail['phone']) ? $detail['phone'] : ''
                    );

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