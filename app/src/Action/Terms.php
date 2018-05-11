<?php

namespace App\Action;

use App\Entity\Privacy\Term;
use Doctrine\ORM\EntityManager;
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

        /**
         * @var EntityManager $em
         */
        $em = $this->getEmPrivacy($ownerId);

        $term = $em->find(Term::class, $termId);

        $js = $this->toJson($term);
        return $response->withJson( $js);
    }
}
