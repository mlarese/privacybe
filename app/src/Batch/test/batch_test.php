<?php

use \App\Batch\DeferredPrivacyBatch;
use \App\Resource\IResultIntegrator;
use App\Env\Env;

require_once '../initbatch.php';

$cont = $app->getContainer();

/** @var DeferredPrivacyBatch $df */
$df = $cont->get('deferred_privacy_batch');
$df->setDebug(true);
$df->sendDeferredEmails();
