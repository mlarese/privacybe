<?php

use GDPR\Batch\EmailSender;
use \GDPR\Batch\EntityManagerBuilder;
use \GDPR\Batch\DeferredPrivacyBatch;
use \Doctrine\ORM\EntityManager;
use \GDPR\Entity\Config\Owner;

require_once 'initbatch.php';

$cont = $app->getContainer();

/** @var DeferredPrivacyBatch $df */
$df = $cont->get('deferred_privacy_batch');
$df->sendDeferredEmails();
