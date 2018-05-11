<?php

namespace App\Resource;


use App\AbstractResource;
use App\Entity\Config\Owner;

class OwnerResource extends AbstractResource {
    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    protected function getRepository() {
        return $this->entityManager->getRepository( Owner::class);
    }

    /**
     * @param $company
     * @param $email
     * @throws CompanyExistException
     * @throws EmailExistException
     */
    protected function checkOwnerExistence($company,$email) {
        $repo = $this->getRepository();

        /**
         * @var $exOwn Owner
         */
        $exOwn = $repo->findOneBy(['company' => $company ] );
        if($exOwn && $exOwn->getCompany() === $company) {
            throw new CompanyExistException('Company alredy exist');
        }

        $exOwn = $repo->findOneBy(['email' => $email ] );
        if($exOwn && $exOwn->getEmail() === $email) {
            throw new EmailExistException('Email alredy exist');
        }
    }

    /**
     * @param $email
     * @param $company
     * @param null $name
     * @param null $surname
     * @param null $city
     * @param null $zip
     * @param null $address
     * @param null $country
     * @param null $county
     * @param null $language
     * @param null $profile
     * @return Owner
     * @throws CompanyExistException
     * @throws EmailExistException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function insert(
            $email,
            $company,
            $name=null,
            $surname=null,
            $city=null,
            $zip=null,
            $address=null,
            $country=null,
            $county=null,
            $language=null,
            $profile=null
    ) {
        $owner = new Owner();
        $repoUser = $this->getRepository();


        $owner
            ->setLanguage( $language)
            ->setEmail($email)
            ->setName($name)
            ->setSurname($surname)
            ->setCity($city)
            ->setZip($zip)
            ->setAddress($address)
            ->setCountry($country)
            ->setCounty($county)
            ->setCompany($company)
            ->setProfile($profile)
            ->setDeleted(false)
            ->setActive(true)

        ;


        $this->checkOwnerExistence($company, $email);

        $this->entityManager->persist($owner);
        $this->entityManager->flush();
        return $owner;
    }

}