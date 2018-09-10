<?php
namespace App\Action;

use App\Action\Emails\EmailHelpers;
use App\Entity\Config\Owner;
use App\Entity\Config\OwnerUserRequest;
use App\Entity\Privacy\UserRequest;
use App\Resource\EmailResource;
use App\Resource\PrivacyResource;
use App\Service\EmailService;
use Doctrine\ORM\EntityManager;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
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
            $mail = $body ['email'];
            $ownerId = $body ['ref'];
            $language = "it";
            $reqDomain = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
            $type = self::TYPE_SUBSCRIPTIONS_REQUEST;
            if(isset($body["domain"])) {
                $reqDomain = $body["domain"];
            }

            if(isset($body["type"])) {
                $type = $body["type"];
            }

            $ownerId = $this->findOwnerIdFromHash($ownerId);

            $em = $this->getEmPrivacy($ownerId);


            /** @var UserRequest $r */
            $r = new UserRequest();

            $uid = Uuid::uuid4();

            $pres = new  PrivacyResource($em);
            $emService = new  EmailService();

            $lastPrv = $pres->getLastPrivacyByEmail($mail);


            if(!isset($lastPrv)) {
                return $response->withStatus(500, 'Error finding last privacy');
            }

            if(isset($body["language"])) {
                $language = $body["language"];
            } else {
                $language = $lastPrv->getLanguage();
            }


            /** @var Owner $owner */
            $owner = $this->getEmConfig()->find(Owner::class, $ownerId);
            $r->setUid($uid )
                ->setCreated(new \DateTime())
                ->setStatus(self::STATUS_OPEN)
                ->setType($type)
                ->setMail($mail)
                ->setNote('')
                ->setDomain($reqDomain)
                ;



            $or = new OwnerUserRequest();
            $or->setUserRequestId( $r->getUid())
                ->setOwnerId( $ownerId);

            $em->persist($r);
            $this->getEmConfig()->persist($or);


            $emailRes = new EmailResource($em, $this->getEmConfig());


            $em->flush();
            $this->getEmConfig()->flush();

            $emailRes->privacyRequest($language, $mail,$ownerId,$this->getContainer(), $reqDomain);

            /**$emService->notifyModAccepted(
                    $this->container,
                    $owner->getEmail(),
                    $mail,
                    $language,
                    $lastPrv->getName(),
                    $lastPrv->getSurname()
                    );**/

            return $response->withJson($this->success());
        } catch (Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error on request');
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
