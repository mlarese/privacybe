<?php
use App\Entity\Owner;
use App\Entity\OwnerData;
use App\Entity\Term;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\Annotations\AnnotationRegistry;
use App\DoctrineEncrypt\Configuration\Encrypted;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\PropertyNormalizer;
use Symfony\Component\Serializer\Serializer;

require_once "../vendor/autoload.php";
AnnotationRegistry::registerLoader('class_exists');

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

$roles = $em->getRepository(\App\Entity\Role::class)->findAll();

print_r($roles);