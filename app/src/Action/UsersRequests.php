<?php
/**
 * Created by PhpStorm.
 * User: mauro.larese
 * Date: 07/06/2018
 * Time: 12:51
 */

namespace App\Action;


use App\Entity\Config\OwnerUserRequest;
use App\Entity\Privacy\UserRequest;
use Doctrine\Common\Annotations\AnnotationException;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\TransactionRequiredException;
use Exception;
use Ramsey\Uuid\Uuid;
use Slim\Http\Request;
use Slim\Http\Response;

class UsersRequests  extends AbstractAction{

    const STATUS_OPEN = 'open';
    const STATUS_COMPLETED = 'completed';

    const TYPE_SUBSCRIPTIONS_REQUEST = 'subscriptions_request';

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     */
    public function insert($request, $response, $args){
        try {
            $body = $request->getParsedBody();

            $mail = $request->getParam('email');
            $ownerId = $request->getParam('ownerId');
            $ownerId = $this->findOwnerIdFromHash($ownerId);

            $em = $this->getEmPrivacy($ownerId);
            $r = new UserRequest();
            $r->setUid( Uuid::uuid4())
                ->setCreated(new \DateTime())
                ->setStatus(self::STATUS_OPEN)
                ->setType(self::TYPE_SUBSCRIPTIONS_REQUEST)
                ->setMail($mail)
                ;

            $or = new OwnerUserRequest();
            $or->setUserRequestId( $r->getUid())
                ->setOwnerId( $ownerId);

            $em->persist($r);
            $this->getEmConfig()->persist($or);

            $em->flush();
            $this->getEmConfig()->flush();

            return $response->withJson($this->success());

        } catch (Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error');
        }

    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     */

    public function update($request, $response, $args){

        try {
            $owid = $this->getOwnerId($request);
            /** @var EntityManager $em */
            $em = $this->getEmPrivacy($owid);
            $body = $request->getParsedBody();
            /** @var UserRequest $ur */
            $ur = $em->find(UserRequest::class, $args['id']);
            if (!isset($ur)) {
                return $response->withStatus(500, 'UserRequest not found');
            }
            if (isset($body['note'])) $ur->setNote($body['note']);
            if (isset($body['status'])) $ur->setStatus($body['status']);
            if (isset($body['history'])) $ur->setHistory($body['history']);
            if (isset($body['flow'])) $ur->setFlow($body['flow']);
            if (isset($body['domain'])) $ur->setDomain($body['domain']);
            if (isset($body['site'])) $ur->setSite($body['site']);
            $ur->setLastAccess(new \DateTime());
            $em->merge($ur);
            $em->flush();
        } catch (Exception $e) {
            echo $e->getMessage();
            return  $response->withStatus(500, 'Error');
        }

        return $response->withJson($this->success());
    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     */

    public function closeRequest($request, $response, $args){

        try {
            $owid = $this->getOwnerId($request);
            /** @var EntityManager $em */
            $em = $this->getEmPrivacy($owid);

            /** @var UserRequest $ur */
            $ur = $em->find(UserRequest::class, $args['id']);
            if (!isset($ur)) {
                return $response->withStatus(500, 'UserRequest not found');
            }


            $ur->setStatus(self::STATUS_COMPLETED);
            $ur->setLastAccess(new \DateTime());
            $em->merge($ur);
            $em->flush();
        } catch (Exception $e) {
            echo $e->getMessage();
            return  $response->withStatus(500, 'Error');
        }

        return $response->withJson($this->success());
    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     */

    public function retrieve($request, $response, $args){

        try {

            $owid = $this->getOwnerId($request);
            /** @var EntityManager $em */
            $em = $this->getEmPrivacy($owid);

            $r = $em->getRepository(UserRequest::class)->findAll();

            return $response->withJson($this->toJson($r));

        } catch (Exception $e) {
            echo $e->getMessage();
            return  $response->withStatus(500, 'Error');
        }

    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     */

    public function retrieveOpen($request, $response, $args){

        try {

            $owid = $this->getOwnerId($request);
            /** @var EntityManager $em */
            $em = $this->getEmPrivacy($owid);

            $r = $em->getRepository(UserRequest::class)->findBy(
                ["status"=>"open"]
            );

            return $response->withJson($this->toJson($r));

        } catch (Exception $e) {
            echo $e->getMessage();
            return  $response->withStatus(500, 'Error');
        }

    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     */

    public function retrieveOne($request, $response, $args){
        try {
            $owid = $this->getOwnerId($request);
            /** @var EntityManager $em */
            $em = $this->getEmPrivacy($owid);
            $body = $request->getParsedBody();
            /** @var UserRequest $ur */
            $ur = $em->find(UserRequest::class, $args['id']);
            if (!isset($ur)) {
                return $response->withStatus(500, 'UserRequest not found');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return  $response->withStatus(500, 'Error');
        }


    }

}
