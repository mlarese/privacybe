<?php

namespace App\Action;


use App\Resource\IExportAdapter;
use Exception;
use Firebase\JWT\JWT;
use Slim\Http\Request;
use Slim\Http\Response;

class ShareSubscriberList extends AbstractAction
{
    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     */
    public function create($request, $response, $args)
    {

        if (count($args) < 2) {
            echo 'error 403 - missing parameter args';
            return $response->withStatus(403, 'missing parameter');
        }



        $ownerId = $this->getOwnerId($request);

        $em = $this->getEmPrivacy($ownerId);

        $container = $this->getContainer();


        try{



            $service = $container->get($args['connector']);

            $adapter = $container->get($args['adapter']);


            $adapter->setEndpoint($service);

            /** @var IExportAdapter $hadapter */
            $connectors = $container->get($args['adapter'] . "_service");

            $hadapter = $container->get($args['adapter'] . "_handler");

            $hadapter->setEntityManager($em);

            $hadapter->setOwner($ownerId);

            return  $hadapter->handle($adapter,$ownerId,$request,$response,$args);


        }
        catch (\Exception $e){

        }

        return $response->withJson($this->error());

    }

    public function list($request, $response, $args)
    {


        if (count($args) < 2) {
            echo 'error 403 - missing parameter args';
            return $response->withStatus(403, 'missing parameter');
        }



        $ownerId = $this->getOwnerId($request);

        $em = $this->getEmPrivacy($ownerId);

        $container = $this->getContainer();


        try{



            $service = $container->get($args['connector']);

            $adapter = $container->get($args['adapter']);


            $adapter->setEndpoint($service);



            /** @var IExportAdapter $hadapter */
            $connectors = $container->get($args['adapter'] . "_service");


            $hadapter = $container->get($args['adapter'] . "_handler");

            $hadapter->setEntityManager($em);

            $hadapter->setOwner($ownerId);

            return  $hadapter->handle($adapter,$ownerId,$request,$response,$args);


        }
        catch (\Exception $e){



        }

        return $response->withJson($this->error());

    }

}
