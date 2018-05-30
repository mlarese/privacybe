<?php

namespace App\Resource;


use Exception;

class MailOneDirectExportHandler implements IExportAdapter
{
    private $entityManager;

    /**
     * @return mixed
     */
    public function getEntityManager() {
        return $this->entityManager;
    }

    /**
     * @param mixed $entityManager
     *
     * @return MailOneDirectExportHandler
     */
    public function setEntityManager($entityManager) {
        $this->entityManager = $entityManager;
        return $this;
    }

    /**
     * @param $adapter IDirectExport
     * @param $ownerId
     * @param $request \Slim\Http\Request
     * @param $response \Slim\Http\Response
     * @param $args
     *
     * @return mixed
     * @throws Exception
     */
    public function handle($adapter, $ownerId, $request, $response, $args)
    {

        if(!isset($this->entityManager)) {
            echo 'error 403 - missing entity manager';
            return $response->withStatus(403, 'missing entity manager');
        }

        $body = $request->getParsedBody();

        if ($body && is_array($body) && count($body) != 4) {
            echo 'error 403 - missing parameter';
            return $response->withStatus(403, 'missing parameter');
        }

        if (!isset($body['contactlistname'])) {
            echo 'error 403 - missing name parameter';
            return $response->withStatus(403, 'missing parameter contactlistname');
        }

        if (!isset($body['contactlistemail'])) {
            echo 'error 403 - missing email parameter';
            return $response->withStatus(403, 'missing parameter contactlistemail');
        }

        if (!isset($body['contactlistreplytoemail'])) {
            echo 'error 403 - missing reply email parameter';
            return $response->withStatus(403, 'missing parameter contactlistreplytoemail');
        }

        if (!isset($body['filters'])) {
            echo 'error 403 - missing filters parameter';
            return $response->withStatus(403, 'missing parameter filters');
        }


        $adapter->setName($body['contactlistname']);
        $adapter->setAction('create');
        $adapter->setEmail($body['contactlistemail']);
        $adapter->setReplyEmail($body['contactlistreplytoemail']);


        $privacyRes = new PrivacyResource($this->entityManager);

        $adapter->setSource(function () use($privacyRes) {
            $list = $privacyRes->privacyList();
            // print_r($list); die;

            $export = [];
            foreach($list as $person){
               $export[] = [
                   'name'=>$person['name'],
                   'surname'=>$person['surname'],
                   'language'=>$person['language'],
                   'email'=>$person['email']
               ];
            }

            return
                array(
                    array("g1", "d1", "giuseppe.donato1@mm-one.com", "it"),
                    array("g2", "d2", "giuseppe.donato2@mm-one.com", "de"),
                    array("g3", "d3", "giuseppe.donato3@mm-one.com", "hu")
                );
        });

        $adapter->export();

        return $response->withJson(["success" => true, "options" => []]);
    }

}
