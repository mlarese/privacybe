<?php

namespace App\Action;

use App\Entity\Config\User;
use App\Entity\Privacy\Operator;
use Doctrine\ORM\EntityManager;
use Slim\Http\Request;
use Slim\Http\Response;

class Operators extends AbstractAction
{
    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     */
    public function getAllOperators($request, $response, $args) {
        $ownerId = $this->getOwnerId($request);

        /**
         * @var EntityManager $em
         */
        $em = $this->getEmPrivacy($ownerId);

        $term = null;
        try {
            $term =  $em->getRepository( Operator::class)->findAll();
        } catch(\Exception $e) {
            echo $e->getMessage();
        }

        $js = $this->toJson($term);
        return $response->withJson( $js);
    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function getOperator($request, $response, $args) {
        $ownerId = $this->getOwnerId($request);
        $id = $args['id'];

        /**
         * @var EntityManager $em
         */
        $em = $this->getEmPrivacy($ownerId);

        $term = $em->find(Operator::class, $id);

        $js = $this->toJson($term);
        return $response->withJson( $js);
    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws \Doctrine\DBAL\ConnectionException
     * @throws \Doctrine\ORM\ORMException
     */
    public function updateOperator($request, $response, $args) {

    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws \Doctrine\DBAL\ConnectionException
     * @throws \Doctrine\ORM\ORMException
     */
    public function newOperator($request, $response, $args) {
        $newUser = new User();
        $newOperator = new Operator();
        $repoUser = $this->getEmConfig()->getRepository( User::class);

        $ownerId = $this->getOwnerId($request);
        /** @var EntityManager $em */
        $em = $this->getEmPrivacy($ownerId);
        try {
            $body = $request->getParsedBody();
            $userName = $this->getAttribute('user',$body,true);
            $userPassword = $this->getAttribute('password',$body, true);

            $name = $this->getAttribute('name', $body,true) . ' ' .$this->getAttribute('surname', true);
            /**
             * @var User $exUsr
             */
            $exUsr = $repoUser->findOneBy(['user' => $body['user'] ] );
            if($exUsr && $exUsr->getUser() === $body['user']) {
                return $response->withStatus(500,"user alredy registered");
            }

        } catch(\Exception $e) {
            return $response->withStatus(500, 'Missing parameter ' . $e->getMessage());
        }

        $this->getEmConfig()->getConnection()->beginTransaction();
        try{
            $newUser
                ->setUser( $userName)
                ->setOwnerId( $ownerId)
                ->setName($name)
                ->setType('owners')
                ->setPassword($userPassword)
            ;

            $this->getEmConfig()->persist($newUser);
            $this->getEmConfig()->flush();
            $currentUserId = $newUser->getId();

            $newOperator
                ->setEmail($this->getAttribute('email', $body, true))
                ->setId($currentUserId)
                ->setPeriodFrom(new \DateTime())
                ->setRole($this->getAttribute('role', $body, true))
                ->setName($this->getAttribute('name', $body, true))
                ->setSurname($this->getAttribute('surname', $body, true))
            ;

            $em->persist($newOperator);
            $em->flush();
            return $response->withJson($this->success());
        } catch (\Exception $e) {
            $this->getEmConfig()->getConnection()->rollBack();

            // echo $e->getMessage();
            return $response->withStatus(500, "Error creating opeerator ");
        }
    }
}
