<?php

namespace App\Resource;

use App\Entity\Config\Owner;
use App\Entity\Privacy\Domain;

class DomainResource extends AbstractResource {
    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    protected function getRepository() {
        return $this->entityManager->getRepository( Domain::class);
    }

    public function findAll() {
        return $this->getRepository()->findBy(["deleted"=>false]);
    }
    /**
     * @param $domains
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function merge(
        $domains
    ) {
        if(!$domains) {
            $domains = [];
        }

        foreach ($domains as $domain) {
            $d = new Domain();
            $deleted = false;
            if(isset($domain['deleted'])) {
                $deleted = $domain['deleted'];
            }
            $d
                ->setName($domain['name'])
                ->setDeleted($deleted)
                ->setActive(true)
            ;
            $this->entityManager->merge($d);
        }

        $this->entityManager->flush();
    }

}