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


if("create" && false){
    $owner = new Owner();
    $ownerData = new OwnerData();

    $ownerData->setEmail("marco.larese@gmail.com");

    $owner  ->setName("Marco Larese")
            ->setCode("marl");


    $em->persist($owner);
    $em->flush();
    $em->refresh($owner);

    $ownerData->setOwner($owner);
    $em->persist($ownerData);
    $em->flush();

}
if("load" && false) {
    $owner = $em->find('App\Entity\Owner', 7);
}

function toEntity($json, $type) {
    $json=json_decode($json);
    $s = new Serializer(
        array(new DateTimeNormalizer(), new ObjectNormalizer() )
    );
    return $s->denormalize($json,$type);
}



function toJson($obj) {
    $on = new ObjectNormalizer();
    $on->setCircularReferenceLimit(1);
    $on->setCircularReferenceHandler(function ($object) { return $object->getId(); });
    $dtn = new DateTimeNormalizer('Y-m-d');
    $s = new Serializer(array($dtn, $on), array(new JsonEncoder()) );

    return $s->normalize($obj,'json');
}

// $jsonContent = $serializer->serialize($person, 'json');
$json = '{"id":1, "code":"gd", "name":"giuseppe donato"}';
if('persist from json' || true) {
    $owner = toEntity($json, 'App\Entity\Owner');

}

if('persist from json' || true) {
    $term = new Term();
    $term->setName('marcolindo');
    $em->persist($term);
    $em->flush();
}


// print_r($term);
// print_r($owner);
$owner = toJson($owner);
// print_r($owner);


$owners = $em->getRepository(Owner::class)->findAll();
$owners = toJson($owners);
print_r($owners);