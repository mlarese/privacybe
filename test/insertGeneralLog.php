<?php

use App\Entity\Owner;
use App\Entity\OwnerData;
use App\Entity\Term;
use Doctrine\ORM\EntityManager;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\PropertyNormalizer;
use Symfony\Component\Serializer\Serializer;

require_once "../vendor/autoload.php";

$settings = include '../app/settings.php';
$settings = $settings['settings']['doctrine'];
$owner = null;
$config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
    $settings['meta']['entity_path'],
    $settings['meta']['auto_generate_proxies'],
    $settings['meta']['proxy_dir'],
    $settings['meta']['cache'],
    false
);

$em = EntityManager::create($settings['connection'], $config);

$log = new \App\Entity\GeneralLog();
$log ->setLogDate(new DateTime())
    ->setType('user insert')
    ->setDescription('user Juliet added');
$em ->persist($log);
$em ->flush();

$log = new \App\Entity\GeneralLog();
$log ->setLogDate(new DateTime())
    ->setType('user insert')
    ->setDescription('user courage added');
$em ->persist($log);
$em ->flush();

$log = new \App\Entity\GeneralLog();
$log ->setLogDate(new DateTime())
    ->setDescription('user courage modified')
    ->setType('user modify');
$em ->persist($log);
$em ->flush();

