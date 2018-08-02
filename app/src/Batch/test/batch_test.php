<?php

use \App\Batch\DeferredPrivacyBatch;
use App\Env\Env;

require_once '../initbatch.php';

$cont = $app->getContainer();

/** @var DeferredPrivacyBatch $df */
$df = $cont->get('deferred_privacy_batch');
$df->setEnv(Env::ENV_DEV);
$df->sendDeferredEmails();