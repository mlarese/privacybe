<?php

use \GDPR\Batch\DeferredPrivacyBatch;
use GDPR\Env\Env;

require_once '../initbatch.php';

$cont = $app->getContainer();

/** @var DeferredPrivacyBatch $df */
$df = $cont->get('deferred_privacy_batch');
$df->sendDeferredEmails();
