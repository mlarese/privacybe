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
    return \Doctrine\ORM\EntityManager::create($settings['doctrine_config']['connection'], $config);
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
    return \Doctrine\ORM\EntityManager::create($settings['doctrine_privacy']['connection'], $config);
};
// -----------------------------------------------------------------------------
// Action factories
// -----------------------------------------------------------------------------

$container['App\Action\HomeAction'] = function ($c) {
    return new App\Action\Home($c->get('view'), $c->get('logger'));
};
