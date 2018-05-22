<?php

namespace App\Action;

use App\Entity\Privacy\Term;
use App\Resource\MandatoryFieldMissingException;
use App\Resource\TermPageResource;
use App\Resource\TermResource;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\TransactionRequiredException;
use Exception;
use Slim\Http\Request;
use Slim\Http\Response;

class Terms extends AbstractAction{
    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     */
    public function getAllTerms($request, $response, $args) {
        $ownerId = $this->getOwnerId($request);

        /**
         * @var EntityManager $em
         */
        $em = $this->getEmPrivacy($ownerId);

        $term = null;
        try {
            $term =  $em->getRepository( Term::class)->findAll();
        } catch(\Exception $e) {
            echo $e->getMessage();
        }

        $js = $this->toJson($term);
        return $response->withJson( $js);
    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function getTerm($request, $response, $args) {
        $ownerId = $this->getOwnerId($request);
        $termId = $args['id'];

        if($termId === '_empty_') {
            $userData = get_object_vars($this->getUserData($request) );
            $js = $this->toJson( TermResource::emptyTerm($userData) );
            return $response->withJson( $js);
        }
        /** @var EntityManager $em */
        $em = $this->getEmPrivacy($ownerId);

        /** @var Term $term */
        $term = $em->find(Term::class, $termId);
        $pagesRes = new TermPageResource($em);
        $term->setPages( $pagesRes->findAll($termId) );
        $js = $this->toJson($term);
        return $response->withJson( $js);
    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws ORMException
     */
    public function updateTerm ($request, $response, $args) {
        $ownerId = $this->getOwnerId($request);
        $user = $this->getUserData($request);
        $userId = 0;
        if(isset($user)) {
            $userId = $user->userId;
        }
        $uid = $args['id'];
        /** @var EntityManager $em */
        $em = $this->getEmPrivacy($ownerId);
        $body = $request->getParsedBody();

        try {
            $name = $this->getAttribute('name', $body, true);
            $deleted = $this->getAttribute('deleted', $body);

            $status = $this->getAttribute('status', $body );
            $paragraphs = $this->getAttribute('paragraphs', $body );
            $pages = $this->getAttribute('pages', $body, false, [] );
            $options = $this->getAttribute('options', $body );
        } catch (MandatoryFieldMissingException $e) {
            return $response->withStatus(500, 'Missing parameter ' . $e->getMessage());
        }

        $res = new TermResource($em);
        $pagRes = new TermPageResource($em);

        try {
            /** @var Term $term */
            $term = $res->update(
                $uid,
                $name,
                $deleted,
                $status,
                $paragraphs,
                $options);

            $pagRes->merge($pages);

            $termJson = $this->toJson($term);
            $res->saveLog('update',$termJson, $term->getUid(), $userId,'update term');

            return $response->withJson($this->success());
        } catch (OptimisticLockException $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'OptimisticLockException inserting term');
        } catch (TransactionRequiredException $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'TransactionRequiredException inserting term');
        } catch (ORMException $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'ORMException inserting term');
        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Exception inserting term');
        }

    }

    /**
     * $testo_new = htmlspecialchars_decode(htmlentities($testo_new, ENT_NOQUOTES, 'UTF-8'), ENT_NOQUOTES);
     */

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function insertTerm ($request, $response, $args) {
        $ownerId = $this->getOwnerId($request);
        $user = $this->getUserData($request);
        $userId = 0;

        if(isset($user)) {
            $userId = $user->userId;
        }

        /** @var EntityManager $em */
        $em = $this->getEmPrivacy($ownerId);

        $body = $request->getParsedBody();

        try {
            $uid = $this->getAttribute('uid', $body, true);
            $name = $this->getAttribute('name', $body, true);
            $status = $this->getAttribute('status', $body, false);
            $paragraphs = $this->getAttribute('paragraphs', $body, false);
            $options = $this->getAttribute('options', $body, false, [] );
            $pages = $this->getAttribute('pages', $body, false, [] );
        } catch (MandatoryFieldMissingException $e) {
            return $response->withStatus(500, 'Missing parameter ' . $e->getMessage());
        }

        try {
            /** @var EntityManager $em */
            $em = $this->getEmPrivacy($ownerId);
            $termRsc = new TermResource($em);
            $term = $termRsc->insert(
                $name,
                $options,
                $paragraphs,
                $status,
                $uid
            );

            $pagRes = new TermPageResource($em);
            $pagRes->merge($pages);


            $termJson = $this->toJson($term);
            $termRsc->saveLog('insert',$termJson, $term->getUid(), $userId,'insert new term');

            return $response->withJson($this->success());
        } catch (OptimisticLockException $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'OptimisticLockException inserting term');
        } catch (ORMException $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'ORMException inserting term');
        }catch (Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Exception inserting term');
        }
    }

}
