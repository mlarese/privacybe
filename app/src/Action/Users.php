<?php

namespace App\Action;


use App\Resource\Privacy\GroupByEmail;
use App\Resource\PrivacyResource;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;
use Slim\Http\Request;
use Slim\Http\Response;

class Users extends AbstractAction
{
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

        try {
            /** @var EntityManager $em */
            $em = $this->getEmPrivacy($ownerId);
            $priRes = new PrivacyResource($em);
            $criteria = null;

            $list = $priRes->privacyListFw($criteria, new GroupByEmail());

            $export = [];
            foreach($list as $email => $person){
                $newExport = [
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
}
