<?php

namespace App\Resource;

use App\Entity\Privacy\TermPage;

class TermPageResource extends AbstractResource {
    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    protected function getRepository() {
        return $this->entityManager->getRepository( TermPage::class);
    }

    /**
     * @param $termUid
     * @return array
     */
    public function findAll($termUid) {
        return $this->getRepository()->findBy(["deleted"=>false, "termUid" => $termUid]);
    }

    /**
     * @param $domainsPages
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function merge(
        $domainsPages
    ) {
        if(!$domainsPages) {
            $domainsPages = [];
        }

        foreach ($domainsPages as $domainPage) {
            if(
                !isset($domainPage['domain']) ||
                !isset($domainPage['page']) ||
                !isset($domainPage['termUid'])
            ) continue;
            $d = new TermPage();
            $deleted = false;
            if(isset($domainPage['deleted'])) {
                $deleted = $domainPage['deleted'];
            }
            $d
                ->setDomain($domainPage['domain'])
                ->setTermUid($domainPage['termUid'])
                ->setPage($domainPage['page'])
                ->setDeleted($deleted)
            ;
            $this->entityManager->merge($d);
        }

        $this->entityManager->flush();

        return $d;
    }

}
