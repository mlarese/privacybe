<?php

use App\Batch\EmailSender;
use \App\Batch\EntityManagerBuilder;
use \App\Batch\DeferredPrivacyBatch;
use \Doctrine\ORM\EntityManager;
use \App\Entity\Config\Owner;

require_once 'initbatch.php';

$cont = $app->getContainer();

/** @var DeferredPrivacyBatch $df */
$df = $cont->get('deferred_privacy_batch');

$df->sendDeferredEmails();
