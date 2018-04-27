<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Syslogic\DoctrineJsonFunctions\Query\AST\Functions\Mysql as DqlFunctions;


require 'vendor/autoload.php';

$settings = include 'app/settings.php';
$settingsConfig = $settings['settings']['doctrine_config'];
$settingsPrivacy= $settings['settings']['doctrine_privacy'];

$doctrinConfig = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
    $settingsConfig['meta']['entity_path'],
    $settingsConfig['meta']['auto_generate_proxies'],
    $settingsConfig['meta']['proxy_dir'],
    $settingsConfig['meta']['cache'],
    false
);

$doctrinPrivacy = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
    $settingsPrivacy['meta']['entity_path'],
    $settingsPrivacy['meta']['auto_generate_proxies'],
    $settingsPrivacy['meta']['proxy_dir'],
    $settingsPrivacy['meta']['cache'],
    false
);


$emConfig = \Doctrine\ORM\EntityManager::create($settingsConfig['connection'], $doctrinConfig);
$emPrivacy = \Doctrine\ORM\EntityManager::create($settingsPrivacy['connection'], $doctrinPrivacy);

// return ConsoleRunner::createHelperSet($emConfig);
return ConsoleRunner::createHelperSet($emPrivacy);
