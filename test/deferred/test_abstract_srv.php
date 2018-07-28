<?php

use App\Service\DeferredPrivacyService;
use App\Service\DependencyNotFoundException;

require_once "../../vendor/autoload.php";



$defs = new DeferredPrivacyService();
$defs->autoConfig();

try {
    $enc = $defs->getDependency('encryptor');
    $appnew = $defs->getDependency('deferred_privacy_service');

    print_r($appnew);
} catch (DependencyNotFoundException $e) {
    echo $e->getMessage();
}

