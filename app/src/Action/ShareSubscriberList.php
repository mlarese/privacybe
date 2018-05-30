<?php

namespace App\Action;


use App\Resource\IExportAdapter;
use Exception;
use Slim\Http\Request;
use Slim\Http\Response;

class ShareSubscriberList extends AbstractAction
{
    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
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

            $hadapter = $container->get($args['adapter'] . "_handler");
            $hadapter->setEntityManager($em);

            return  $hadapter->handle($adapter,$ownerId,$request,$response,$args);


        }
        catch (\Exception $e){

        }

        return $response->withJson($this->error());

    }

}
