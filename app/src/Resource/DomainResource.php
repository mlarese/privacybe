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

    public function merge(
        $domains
    ) {
        if(!$domains) {
            $domains = [];
        }

        $currentDomains = $this->entityManager->getRepository(Domain::class)->findAll();
        $domainsByName = [];

        foreach ($domains as $domain) {
            $domainsByName[$domain['name']] =$domain;
            $d = new Domain();
            $d->setName($domain['name']);
            $this->entityManager->merge($d);
            $this->entityManager->flush();
        }
        /** @var Domain $currentDomain */
        foreach ($currentDomains as $currentDomain) {
            $key =  $currentDomain->getName();
            if(!key_exists($key,$domainsByName)) {
                $this->entityManager->remove($currentDomain);
            }
        }
        $this->entityManager->flush();
    }

}