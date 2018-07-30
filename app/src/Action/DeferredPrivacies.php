<?php

namespace App\Action;

use App\DoctrineEncrypt\Encryptors\EncryptorInterface;
use App\Entity\Config\ActionHistory;
use App\Entity\Privacy\Privacy;
use App\Entity\Privacy\PrivacyDeferred;
use App\Entity\Privacy\Term;
use App\Entity\Privacy\TermHistory;
use App\Resource\DeferredPrivacyResource;
use App\Resource\MandatoryFieldMissingException;
use App\Resource\PrivacyResource;
use App\Resource\TermPageResource;
use App\Resource\TermResource;
use App\Resource\Logs;
use App\Service\DeferredPrivacyService;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\TransactionRequiredException;
use Exception;
use Ramsey\Uuid\Uuid;
use function session_commit;
use Slim\Http\Request;
use Slim\Http\Response;

class DeferredPrivacies extends AbstractAction{

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     */
    public function setVisited($request, $response, $args) {
        try {

            $body = $request->getParsedBody();
            $_k = $body['_k'];
            $_j = $body['_j'];

            /** @var EncryptorInterface $enc */
            $enc = $this->getContainer()->get('encryptor');
            $ownerId = $enc->decrypt( base64_decode( $_k ));
            $privacyUid = $enc->decrypt( base64_decode( $_j ));

            // die(" o=$ownerId   p=$privacyUid");
            /** @var EntityManager $em */
            $em = $this->getEmPrivacy($ownerId);

            /** @var DeferredPrivacyService $srv */
            $srv = $this->getContainer()->get('deferred_privacy_service');

            $defRes = new DeferredPrivacyResource($em, $srv );

            $defRes->setVisited($privacyUid);

            $prRes = new PrivacyResource($em);
            $pr=$prRes->getPrivacy($privacyUid);

            return $response->withJson( $this->toJson($pr)  );

        } catch (Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Exception with privacy');
        }
    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     */
    public function setStatus($request, $response, $args)
    {
        $ownerId = $this->getOwnerId($request);
        $uid = $args['uid'];
        try {
            /** @var EntityManager $em */
            $em = $this->getEmPrivacy($ownerId);

            $body = $request->getParsedBody();
            $status = $body['status'];

            /** @var DeferredPrivacyService $srv */
            $srv = $this->context->get('deferred_privacy_service');
            $res = new DeferredPrivacyResource($em, $srv );

            $res->setStatus($uid,$status);
            return $response->withJson($this->success());

        } catch (Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Exception saving privacy');
        }

    }



}
