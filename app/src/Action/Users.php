<?php

namespace App\Action;


use App\Entity\Config\User;
use App\Entity\Privacy\Privacy;
use App\Resource\Privacy\EmptyFilter;
use App\Resource\Privacy\GroupByEmail;
use App\Resource\PrivacyLogger;
use App\Resource\PrivacyLoggerResource;
use App\Resource\PrivacyResource;
use App\Service\AttachmentsService;
use Closure;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;
use Exception;
use Interop\Container\Exception\ContainerException;
use function session_commit;
use Slim\Http\Request;
use Slim\Http\Response;

class Users extends AbstractAction
{
    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     *
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function saveAttachment($request, $response, $args){

        try {
            $ownerId = $args['ownerId'];
            $privacyId = $args['privacyId'];
            /** @var \Slim\Http\UploadedFile[] $file */
            $files = $request->getUploadedFiles();
            $attSrv = $this->getContainer()->get('attachments_service');
            $attSrv->savePrivacyAttachment($files, $ownerId, $privacyId);
        } catch (Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, "Error saving attachments");
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
    public function saveAttachList($request, $response, $args){
        /** @var Closure $closure */
        $container = $this->getContainer();
        $closure = function ($post) use($args, $container){
            $attachList = $post['attachList'];
        };
        return $this->postActionPrototype($request, $response, $args, $closure);
    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     */
    public function search($request, $response, $args)
    {
        $ownerId = $this->getOwnerId($request);
        session_commit();
        ini_set('memory_limit', '1024M');
        set_time_limit ( 300 );

        try {
            /** @var EntityManager $em */
            $em = $this->getEmPrivacy($ownerId);
            $priRes = new PrivacyResource($em);
            $body  = $request->getParsedBody();

            $criteria = null;
            if(isset($body['filters']))
                $criteria = $body['filters'];

            $step = "- getting list";
            $list = $priRes->privacyListFw($criteria, new GroupByEmail());
            // $list = $priRes->privacyListLight($criteria, new GroupByEmail());



            // print_r($list);
            // die('fine');
            $export = [];
            $step.= "- creating records";
            foreach($list as $email => &$person){
                $newExport = [
                    // 'id' => $person['id'],
                    // '_counter_' => isset($person['_counter_'])?$person['_counter_']:0,
                    '_flags_' => isset($person['_flags_'])?$person['_flags_']:[],
                    'name'=>&$person['name'],
                    'surname'=>&$person['surname'],
                    'email'=>&$person['email'],
                    'termId'=>&$person['termId'],
                    'domain'=>&$person['domain'],
                    'site'=>&$person['site'],
                    'created'=>&$person['created'],
                    'language'=>&$person['language'],
                    'termName'=> &$person['termName']
                ];


                $export[] = $newExport;
            }

            unset($list);

            return $response->withJson($this->toJson($export));


        } catch (ORMException $e) {
            echo $e->getMessage();
            echo " $step";
            return $response->withStatus(500, 'ORMException searching user');
        } catch (\Exception $e) {
            echo $e->getMessage();
            echo " $step";
            return $response->withStatus(500, 'Exception searching user');
        }

    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     */
    public function searchToday($request, $response, $args)
    {
        session_commit();
        $ownerId = $this->getOwnerId($request);

        try {
            /** @var EntityManager $em */
            $em = $this->getEmPrivacy($ownerId);
            $priRes = new PrivacyResource($em);

            $criteria = [
                'created' => date('Y-m-d')
            ];

            $list = $priRes->privacyListFw($criteria, new GroupByEmail(), new EmptyFilter());

            $export = [];
            foreach($list as $email => $person){
                $newExport = [
                    'id' => $person['id'],
                    'name'=>$person['name'],
                    'surname'=>$person['surname'],
                    'email'=>$person['email'],
                    'created'=>$person['created'],
                    'language'=>$person['language']
                ];
                $export[] = $newExport;
            }

            return $response->withJson($this->toJson($export));


        } catch (ORMException $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'ORMException saving privacy');
        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Exception saving privacy');
        }

    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws ORMException
     */
    public function privacyUser($request, $response, $args) {
        try {
            session_commit();
            $ownerId = $this->getOwnerId($request);
            /** @var EntityManager $em */
            $em = $this->getEmPrivacy($ownerId);

            $email = $args['email'];
            $email = urldecode(   base64_decode($email));


            $privacyRes = new PrivacyResource($em);
            $user = $privacyRes->privacyRecord($email);


        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error');
        }

        return $response->withJson( $user);
    }


    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     */
    public function changePassword($request, $response, $args)
    {

        try {

            $body = $request->getParsedBody();


            if(
                !isset($body['userId']) ||
                !isset($body['password']) ||
                !isset($body['oldPassword']) ||
                !isset($body['repeatPassword'])
            ) {
                return $response->withStatus(401, 'Wrong request');
            }

            if(   strlen($body['password'])<8 ) {
                return $response->withStatus(401, 'At least 8 characters');
            }


            /** @var User $user */
            $user = $this->getEmConfig()->find(User::class, $body['userId']);

            if(  !isset($user)) {
                return $response->withStatus(401, 'User not found');
            }


            $oldPwdMd5 = md5($body['oldPassword']);
            if( $oldPwdMd5!==$user->getPassword()  ) {
                return $response->withStatus(401, 'Wrong old password');
            }


            $user->setPassword(      md5($body['password'])    );
            $this->getEmConfig()->merge($user);
            $this->getEmConfig()->flush();

            return $response->withJson($this->success());
        } catch (ORMException $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'ORMException changing password');
        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Exception changing password');
        }

    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     */
    public function deleteUserSubscriptions($request, $response, $args)
    {

        try {
            $ownerId = $this->getOwnerId($request);
            $email = $args['email'];
            $email = urldecode(   base64_decode($email));

            /** @var EntityManager $em */
            $em = $this->getEmPrivacy($ownerId);
            $priRes = new PrivacyResource($em);

            $priRes->deletePrivacyByEmail($email);
            return $response->withJson($this->success());

        } catch (ORMException $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'ORMException saving privacy');
        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Exception saving privacy');
        }

    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws \Doctrine\Common\Annotations\AnnotationException
     */
    public function updateTerms($request, $response, $args)
    {


        try {
            $ownerId = $this->getOwnerId($request);
            $body = $request->getParsedBody();
            $userData = $this->getUserData($request);

            /** @var EntityManager $em */
            $em = $this->getEmPrivacy($ownerId);
            $priRes = new PrivacyResource($em);
            $prilogRes = new PrivacyLoggerResource($em);

            foreach ($body as $privacy) {
                /** @var Privacy $p */
                $p = $em->find(Privacy::class, $privacy['id']);

                $p->setPrivacy($privacy['privacy'])
                    ->setPrivacyFlags($privacy['privacyFlags'])
                ;

                $em->merge($p);
                $prilogRes->operatorPrivacyLog($p,$userData,false);


            }

            $em->flush();

        } catch (ORMException $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'ORMException saving privacy');
        } catch (Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Exception saving privacy');
        }
        return  $response->withJson($this->success());
    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws \Doctrine\Common\Annotations\AnnotationException
     */
    public function updateMainData($request, $response, $args)
    {
        try {
            $ownerId = $this->getOwnerId($request);
            $body= $request->getParsedBody();
            $id = $args['id'];


            /** @var EntityManager $em */
            $em = $this->getEmPrivacy($ownerId);
            $plhr = new PrivacyLoggerResource($em);

            /** @var Privacy $pr */
            $pr = $em->find(Privacy::class, $id);

            $pr
                ->setName( $body['name'] )
                ->setSurname( $body['surname'] )
                ->setEmail( $body['email'] )
                ->setTelephone( $body['telephone'] )
            ;

            $em->merge($pr);

            $userObj = $this->getUserData($request);
            $plhr->operatorPrivacyLog($pr,$userObj,false);
            $em->flush();

            return  $response->withJson($this->success());

        } catch (ORMException $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'ORMException saving privacy');
        } catch (Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Exception saving privacy');
        }

    }
}
