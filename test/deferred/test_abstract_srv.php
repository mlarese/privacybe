<?php

use GDPR\Service\DeferredPrivacyService;
use GDPR\Service\DependencyNotFoundException;

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

