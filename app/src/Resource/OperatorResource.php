<?php

namespace App\Resource;

use App\Entity\Config\User;
use App\Entity\Privacy\Operator;
use DateTime;
use Exception;

/**
 * Class Resource
 * @package App
 */
class OperatorResource extends AbstractResource
{
    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    protected function getRepository() {
        return $this->entityManager->getRepository( Operator::class);
    }

    /**
     * @param $id
     * @param $role
     * @param $periodFrom
     * @param null $email
     * @param null $name
     * @param null $surname
     * @param null $periodTo
     * @param null $telephone
     * @param $zip
     * @param null $
     * @param null $city
     * @param null $address
     * @param null $domains
     * @param bool $active
     * @return Operator
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function insert(
        $id,
        $role,
        $periodFrom,
        $email=null,
        $name=null,
        $surname=null,
        $periodTo=null,
        $telephone=null,
        $zip=null,
        $city=null,
        $address=null,
        $domains=null,
        $active=true

    ) {
        $newOperator = new Operator();

        if(!isset($periodFrom))  $periodFrom = new DateTime();
        if(!isset($active))  $active = true;
        $newOperator
            ->setEmail($email)
            ->setId($id)
            ->setPeriodFrom($periodFrom)
            ->setPeriodTo($periodTo)
            ->setRole($role)
            ->setName($name)
            ->setTelephone($telephone)
            ->setZip($zip)
            ->setCity($city)
            ->setAddress($address)
            ->setDomains($domains)
            ->setActive($active)
            ->setSurname($surname)
        ;

        $this->entityManager->persist($newOperator);
        $this->entityManager->flush();

        return $newOperator;
    }

    /**
     * @param $id
     * @param $email
     * @param $role
     * @param $name
     * @param $surname
     * @param $periodFrom
     * @param $periodTo
     * @param $telephone
     * @param $zip
     * @param $city
     * @param $address
     * @param $domains
     * @param $active
     *
     * @return null|object
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function update(
        $id,
        $email,
        $role,
        $name,
        $surname,
        $periodFrom,
        $periodTo,
        $telephone,
        $zip,
        $city,
        $address,
        $domains,
        $active
    ) {

        /** @var Operator $operator */
        $operator = $this->entityManager->find(Operator::class,$id);

        $operator
            ->setEmail($email)
            ->setPeriodFrom($periodFrom)
            ->setPeriodTo($periodTo)
            ->setRole($role)
            ->setName($name)
            ->setTelephone($telephone)
            ->setZip($zip)
            ->setCity($city)
            ->setAddress($address)
            ->setDomains($domains)
            ->setActive($active)
            ->setSurname($surname)
        ;

        $this->entityManager->merge($operator);
        $this->entityManager->flush();

        return $operator;
    }
}