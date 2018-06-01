<?php

namespace App\Action;


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

            $priRes->privacyListFw();

        } catch (ORMException $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'ORMException saving privacy');
        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Exception saving privacy');
        }

    }
}