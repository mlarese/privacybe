<?php

namespace App\Action;

use App\Entity\Privacy\Term;
use App\Resource\MandatoryFieldMissingException;
use App\Resource\TermResource;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
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
            $js = $this->toJson( TermResource::emptyTerm() );
            return $response->withJson( $js);
        }
        /** @var EntityManager $em */
        $em = $this->getEmPrivacy($ownerId);

        $term = $em->find(Term::class, $termId);

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
    public function updateTerm ($request, $response, $args) {
        $ownerId = $this->getOwnerId($request);
        /** @var EntityManager $em */
        $em = $this->getEmPrivacy($ownerId);
        $body = $request->getParsedBody();

        try {
            $uid = $this->getAttribute('uid', $body, true);
            $name = $this->getAttribute('name', $body, true);

            $deleted = $this->getAttribute('modified', $body);
            $modified = $this->getAttribute('modified', $body);
            $published = $this->getAttribute('published', $body);
            $suspended = $this->getAttribute('suspended', $body);

            $status = $this->getAttribute('status', $body, false);
            $paragraphs = $this->getAttribute('paragraphs', $body, false);
            $options = $this->getAttribute('options', $body, false );
        } catch (MandatoryFieldMissingException $e) {
            return $response->withStatus(500, 'Missing parameter ' . $e->getMessage());
        }

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
    public function insertTerm ($request, $response, $args) {
        $ownerId = $this->getOwnerId($request);
        /** @var EntityManager $em */
        $em = $this->getEmPrivacy($ownerId);

        $body = $request->getParsedBody();

        try {
            $uid = $this->getAttribute('uid', $body, true);
            $name = $this->getAttribute('name', $body, true);
            $status = $this->getAttribute('status', $body, false);
            $paragraphs = $this->getAttribute('paragraphs', $body, false);
            $options = $this->getAttribute('options', $body, false, [] );
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
        } catch (OptimisticLockException $e) {
            echo $e->getMessage();
            return $response->withStatus(401, 'OptimisticLockException inserting term');
        } catch (ORMException $e) {
            echo $e->getMessage();
            return $response->withStatus(401, 'ORMException inserting term');
        }catch (Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(401, 'Exception inserting term');
        }

        return $response->withJson($this->success());
    }
}
