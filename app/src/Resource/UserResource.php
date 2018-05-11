<?php

namespace App\Resource;

use App\AbstractResource;
use App\Entity\Config\User;

/**
 * Class Resource
 * @package App
 */
class UserResource extends AbstractResource{
    public function update($data) {

    }

    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    protected function getRepository() {
        return $this->entityManager->getRepository( User::class);
    }

    /**
     * @param $user
     *
     * @throws UserExistException
     */
    protected function checkUserExistence($user) {
        $repoUser = $this->getRepository();

        $exUsr = $repoUser->findOneBy(['user' => $user ] );
        if($exUsr && $exUsr->getUser() === $user) {
            throw new UserExistException("user $user alredy exists");
        }
    }

    /**
     * @param $user
     * @param $password
     * @param $type
     * @param $ownerId
     * @param $name
     * @return User
     * @throws UserExistException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function insert($user, $password, $type, $ownerId, $name) {
        $newUser = new User();
        $repoUser = $this->getRepository();

        $newUser
            ->setUser( $user)
            ->setOwnerId( $ownerId)
            ->setName($name)
            ->setType($type)
            ->setPassword( md5($password))
        ;

        $this->checkUserExistence($user);

        $this->entityManager->persist($newUser);
        $this->entityManager->flush();
        return $newUser;
    }
}
