<?php
use App\Entity\Owner;
use App\Entity\OwnerData;
use App\Entity\Term;
use App\Entity\Config\Enc;
use Doctrine\ORM\EntityManager;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\PropertyNormalizer;
use Symfony\Component\Serializer\Serializer;

require_once "../vendor/autoload.php";
require_once "../app/src/DoctrineEncrypt/Configuration/Encrypted.php";

function toJson($obj) {

    $on = new ObjectNormalizer();
    $on->setCircularReferenceLimit(1);
    $on->setCircularReferenceHandler(function ($object) { return $object->getId(); });

    $dtn = new DateTimeNormalizer('Y-m-d');
    $s = new Serializer(array($dtn, $on), array(new JsonEncoder()) );

    return $s->normalize($obj,'json');
}

$settings = include '../app/settings.php';
$settings = $settings['settings']['doctrine_config'];
$owner = null;
$config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
    $settings['meta']['entity_path'],
    $settings['meta']['auto_generate_proxies'],
    $settings['meta']['proxy_dir'],
    $settings['meta']['cache'],
    false
);

$em = EntityManager::create($settings['connection'], $config);

$subscriber = new \App\DoctrineEncrypt\Subscribers\DoctrineEncryptSubscriber(
    new \Doctrine\Common\Annotations\AnnotationReader(),
    new \App\DoctrineEncrypt\Encryptors\OpenSslEncryptor('o71aD2Ep.Gj4I<5KL6MN7OP_qR98>-UW')
);

$eventManager = $em->getEventManager();
$eventManager->addEventSubscriber($subscriber);


$e = new Enc();

$e
    ->setName('Mauro')
    ->setForm('{"name":"mauro"}')
;


$em->persist($e);
$em->flush();

//$r = $em->find(Enc::class, 2);
//print_r($r);
