<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Syslogic\DoctrineJsonFunctions\Query\AST\Functions\Mysql as DqlFunctions;


require 'vendor/autoload.php';

$settings = include 'app/settings.php';
$settingsConfig = $settings['settings']['doctrine_config'];
$settingsPrivacy= $settings['settings']['doctrine_privacy'];
$settingsUpgrade= $settings['settings']['doctrine_upgrade'];

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

$doctrinUpgrade = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
    $settingsUpgrade['meta']['entity_path'],
    $settingsUpgrade['meta']['auto_generate_proxies'],
    $settingsUpgrade['meta']['proxy_dir'],
    $settingsUpgrade['meta']['cache'],
    false
);


$emConfig = \Doctrine\ORM\EntityManager::create($settingsConfig['connection'], $doctrinConfig);
$emPrivacy = \Doctrine\ORM\EntityManager::create($settingsPrivacy['connection'], $doctrinPrivacy);
$emUpgrade = \Doctrine\ORM\EntityManager::create($settingsUpgrade['connection'], $doctrinUpgrade);

return ConsoleRunner::createHelperSet($emConfig);
// return ConsoleRunner::createHelperSet($emPrivacy);






//return ConsoleRunner::createHelperSet($emUpgrade);
