<?php

use App\Manager\ApplicationMiddleware;
use Doctrine\Common\Annotations\AnnotationRegistry;
if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $file = __DIR__ . $_SERVER['REQUEST_URI'];
    if (is_file($file)) {
        return false;
    }
}


require __DIR__ . '/../../../vendor/autoload.php';

// session_start();

require __DIR__ . '/../../../app/src/DoctrineEncrypt/Configuration/Encrypted.php';

// Instantiate the app

$localSettingsPath = __DIR__ . '/../../../app/settings_local.php';
$settingsPath = __DIR__ . '/../../../app/settings.php';

if(file_exists($localSettingsPath)) {
    $settings = require $localSettingsPath;
} else {
    $settings = require $settingsPath;
}

// print_r($settings);  die('settings');


$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/../../../app/dependencies.php';

$am = new ApplicationMiddleware([],$app);
