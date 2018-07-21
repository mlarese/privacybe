<?php
use \App\Batch\EntityManagerBuilder;
use \App\Batch\DeferredPrivacyBatch;
use \Doctrine\ORM\EntityManager;
use \App\Entity\Config\Owner;

require_once 'initbatch.php';


/** @var \Slim\App $app */
$embld = new EntityManagerBuilder($app->getContainer());
$defb = new DeferredPrivacyBatch($embld, $app->getContainer());

$defb->sendDeferredEmails();
