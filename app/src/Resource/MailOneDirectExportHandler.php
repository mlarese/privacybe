<?php
namespace App\Resource;


class MailOneDirectExportHandler
{
    /**
     * @param $adapter IDirectExport
     * @param $ownerId
     * @param $request \Slim\Http\Request
     * @param $response \Slim\Http\Response
     * @param $args
     * @return mixed
     */
    public function handle($adapter,$ownerId,$request,$response,$args){
/*
        if (!isset($args['domainid'])) {
            echo 'error 403 - missing domain parameter';
            return $response->withStatus(403, 'missing parameter');
        }


        if (!isset($args['pathid'])) {
            echo 'error 403 - missing path parameter';
            return $response->withStatus(403, 'missing parameter');
        }

        if (!isset($args['email'])) {
            echo 'error 403 - missing email parameter';
            return $response->withStatus(403, 'missing parameter');
        }
*/


           $body = $request->getParsedBody();

           if($body && is_array($body) && count($body)!=4){
               echo 'error 403 - missing parameter';
               return $response->withStatus(403, 'missing parameter');
           }

        if (!isset($body['contactlistname'])) {
            echo 'error 403 - missing name parameter';
            return $response->withStatus(403, 'missing parameter');
        }

        if (!isset($body['contactlistemail'])) {
            echo 'error 403 - missing email parameter';
            return $response->withStatus(403, 'missing parameter');
        }

        if (!isset($body['contactlistreplytoemail'])) {
            echo 'error 403 - missing reply email parameter';
            return $response->withStatus(403, 'missing parameter');
        }

        if (!isset($body['filters'])) {
            echo 'error 403 - missing filters parameter';
            return $response->withStatus(403, 'missing parameter');
        }



            $adapter->setName($body['contactlistname']);
            $adapter->setAction('create');
            $adapter->setEmail($body['contactlistemail']);
            $adapter->setReplyEmail($body['contactlistreplytoemail']);

            $adapter->setSource(function (){

                return
                    array(
                        array("g1","d1","giuseppe.donato1@mm-one.com","it"),
                        array("g2","d2","giuseppe.donato2@mm-one.com","de"),
                        array("g3","d3","giuseppe.donato3@mm-one.com","hu")
                    );
            });

            $adapter->export();

        return $response->withJson( ["success"=>true, "options"=>[]]);
    }

}
