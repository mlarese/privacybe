<?php

namespace App\Resource;

use App\Entity\Config\Owner;
use App\Entity\Config\User;
use App\Entity\Privacy\Domain;
use App\Entity\Proxy\OwnerProxy;
use Doctrine\ORM\EntityManager;
use Exception;

class DomainResource extends AbstractResource {
    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    protected function getRepository() {
        return $this->entityManager->getRepository( Domain::class);
    }

    public static function getDomainRefs(EntityManager $em, $ownerId) {
          $qb = $em->createQueryBuilder();
          $qb->select(['d.name', $ownerId.' as ownerId'])
              ->from(Domain::class,'d')
              ->where('d.deleted=0');

          return $qb->getQuery()->execute();
    }
    /**
     * @param               $domain
     * @param EntityManager $em
     *
     * @return bool
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function ownerHas($domain, EntityManager $em=null) {
        if($em === null)
            $em = $this->entityManager;

        $d = $em->find(Domain::class, $domain);
        // disabilitato momentaneamente
        if(!isset($d)) {
            // throw new Exception('Domain not available');
        }
        return true;
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
