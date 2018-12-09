<?php

namespace GDPR\Resource;

use GDPR\Entity\Privacy\Treatment;

/**
 * Class Resource
 * @package App
 */
class TreatmentsResource extends AbstractResource{
    public function update($data) {

    }

    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    protected function getRepository() {
        return $this->entityManager->getRepository( Treatment::class);
    }

    /**
     * @return array
     */
    public function map(){
        $repo = $this->getRepository();

        $qb = $repo->createQueryBuilder('t');
        $qb
            ->select([
                't.code',
                't.name'
            ])
            ->where('t.deleted=0')

        ;

        $results = $qb->getQuery()->getResult();
        $res = [];

        foreach ($results as $item){
            $res[$item['code']] = $item;
        }

        return $res;
    }

}
