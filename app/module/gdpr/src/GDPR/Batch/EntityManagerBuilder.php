<?php

namespace GDPR\Batch;


use Doctrine\ORM\EntityManager;

class EntityManagerBuilder {
    private $container;

    /**
     * EntityManagerBuilder constructor.
     * @param $container
     */
    public function __construct($container)
    {
        $this->container = $container;
    }


    public function buildEmConfig(): EntityManager
    {
        return $this->container['em-config'];
    }

    public function buildSUPrivateEM($ownerId):EntityManager {
        $settings = $this->container['settings'];

        $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
            $settings['doctrine_privacy']['meta']['entity_path'],
            $settings['doctrine_privacy']['meta']['auto_generate_proxies'],
            $settings['doctrine_privacy']['meta']['proxy_dir'],
            $settings['doctrine_privacy']['meta']['cache'],
            false
        );


        $connection = array(
            'driver'   => $settings['doctrine_privacy']['connection']['driver'],
            'host'     => $settings['doctrine_privacy']['connection']['host'],
            'dbname'   => 'privacy_'.$ownerId,
            'user'     => $settings['doctrine_config']['connection']['user'],
            'password' => $settings['doctrine_config']['connection']['password']
        );



        $em = \Doctrine\ORM\EntityManager::create($connection , $config);

        $subscriber = new \App\DoctrineEncrypt\Subscribers\DoctrineEncryptSubscriber(
            new \Doctrine\Common\Annotations\AnnotationReader(),
            new \App\DoctrineEncrypt\Encryptors\OpenSslEncryptor($settings['doctrine_privacy']['encryption_key'])
        );

        $eventManager = $em->getEventManager();
        $eventManager->addEventSubscriber($subscriber);

        return $em;

    }
}
