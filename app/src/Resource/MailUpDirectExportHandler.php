<?php

namespace App\Resource;


use App\Resource\Privacy\GroupByEmail;
use Exception;
use function explode;
use function json_decode;

class MailUpDirectExportHandler implements IExportAdapter
{
    private $entityManager;

    private $owner;


    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param mixed $owner
     */
    public function setOwner($owner): void
    {
        $this->owner = $owner;
    }

    /**
     * @return mixed
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * @param mixed $entityManager
     *
     * @return MailOneDirectExportHandler
     */
    public function setEntityManager($entityManager)
    {
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


        if (!isset($this->entityManager)) {
            echo 'error 403 - missing entity manager';
            return $response->withStatus(403, 'missing entity manager');
        }

        if ($args['action'] == 'export') {

            $body = $request->getParsedBody();

            if (!isset($body) || $body === null) {

                $body = $request->getBody();

                try{
                   $body = $body->read($body->getSize());
                    $body = explode('json=', $body);

                }
                catch (\Exception $e){

                }

                if (count($body) < 2) {
                    echo 'error 403 - malformed json request';
                    return $response->withStatus(403, 'malformed json request');
                }

                $body = json_decode($body[1], true);
            }

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

            $adapter->setEmail($body['contactlistemail']);

            $adapter->setReplyEmail($body['contactlistreplytoemail']);

        }

        $adapter->setAction($args['action']);
        $adapter->setOwner($this->owner);


        $privacyRes = new PrivacyResource($this->entityManager);

        $criteria = $body['filters'];

        $adapter->setSource(function () use ($privacyRes, $criteria) {
            $list = $privacyRes->privacyListFw($criteria, new GroupByEmail());

            $export = [];
            foreach ($list as $email => $person) {

                $export[] = [
                    'name' => $person['name'],
                    'surname' => $person['surname'],
                    'email' => $person['email'],
                    'language' => $person['language']

                ];
            }

            return $export;
        });

        $result = $adapter->export();

        return $response->withJson(["success" => true,"data" =>$result ]);
    }

}
