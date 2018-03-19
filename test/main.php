<?php

use App\Entity\Owner;
use App\Entity\OwnerData;
use Doctrine\ORM\EntityManager;

require_once "../vendor/autoload.php";
$settings = include '../app/settings.php';
$settings = $settings['settings']['doctrine'];

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
if("load" || true) {
    $owner = $em->find('App\Entity\Owner', 7);
}


$owner->getOwnerData()->setEmail("marco.dondi@gmail.com");
$em->persist($owner);
$em->flush();


print_r($owner);