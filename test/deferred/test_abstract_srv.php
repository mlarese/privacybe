<?php

use App\Service\DeferredPrivacyService;
use App\Service\DependencyNotFoundException;

require_once "../../vendor/autoload.php";



$defs = new DeferredPrivacyService();
$defs->autoConfig();

try {
    $enc = $defs->getDependency('encryptor');
    print_r($enc);
} catch (DependencyNotFoundException $e) {
    echo $e->getMessage();
}

