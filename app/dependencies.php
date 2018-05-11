<?php
// DIC configuration

$container = $app->getContainer();

// -----------------------------------------------------------------------------
// Service factories
// -----------------------------------------------------------------------------

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings');
    $logger = new \Monolog\Logger($settings['logger']['name']);
    $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
    $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['logger']['path'], \Monolog\Logger::DEBUG));
    return $logger;
};

$container['dyn-privacy-db'] = function ($c) {
    $settings = $c->get('settings');
    return $settings['doctrine_privacy']['dynamic_db'];
};

// Doctrine
$container['em-config'] = function ($c) {
    $settings = $c->get('settings');
    $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
        $settings['doctrine_config']['meta']['entity_path'],
        $settings['doctrine_config']['meta']['auto_generate_proxies'],
        $settings['doctrine_config']['meta']['proxy_dir'],
        $settings['doctrine_config']['meta']['cache'],
        false
    );

    $subscriber = new \App\DoctrineEncrypt\Subscribers\DoctrineEncryptSubscriber(
        new \Doctrine\Common\Annotations\AnnotationReader(),
        new \App\DoctrineEncrypt\Encryptors\OpenSslEncryptor($settings['doctrine_config']['encryption_key'])
    );
    $em = \Doctrine\ORM\EntityManager::create($settings['doctrine_config']['connection'], $config);
    $eventManager = $em->getEventManager();
    $eventManager->addEventSubscriber($subscriber);

    return $em;
};

$container['em-privacy'] = function ($c) {
    $settings = $c->get('settings');
    $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
        $settings['doctrine_privacy']['meta']['entity_path'],
        $settings['doctrine_privacy']['meta']['auto_generate_proxies'],
        $settings['doctrine_privacy']['meta']['proxy_dir'],
        $settings['doctrine_privacy']['meta']['cache'],
        false
    );


    $subscriber = new \App\DoctrineEncrypt\Subscribers\DoctrineEncryptSubscriber(
        new \Doctrine\Common\Annotations\AnnotationReader(),
        new \App\DoctrineEncrypt\Encryptors\OpenSslEncryptor($settings['doctrine_privacy']['encryption_key'])
    );
    $em = \Doctrine\ORM\EntityManager::create($settings['doctrine_privacy']['connection'], $config);
    $eventManager = $em->getEventManager();
    $eventManager->addEventSubscriber($subscriber);

    return $em;
};

$container['session'] = function ($container) {
    return new \Adbar\Session(
        $container->get('settings')['session']['namespace']
    );
};



$container['sendCoupon'] = function ($container) {
    $couponService = new \App\Action\SendOneCoupon();
    $settings = $container->get('settings');

    if(isset($settings['StoreOne']) && isset($settings['StoreOne']['url'])){
        $couponService->setUrl($settings['StoreOne']['url']);
    }

    return $couponService;
};

$container['couponStoreOne'] = function ($container) {
    $couponService = new \App\Action\StoreOneCoupon();
    $settings = $container->get('settings');

    if(isset($settings['StoreOne']) && isset($settings['StoreOne']['url'])){
        $couponService->setUrl($settings['StoreOne']['url']);
    }

    return $couponService;
};

$container['actionHandler'] = function ($container) {
    $actionHandler = new \App\Action\ActionHandler($container);


    return $actionHandler;
};
