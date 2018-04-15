<?php
/**
 * Created by PhpStorm.
 * User: mauro.larese
 * Date: 10/04/2018
 * Time: 13:05
 */

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
        $ownerId = $request->getHeader('OwnerId')[0];

        /**
         * @var EntityManager $em
         */
        $em = $this->getEmPrivacy($ownerId);

        $terms = null;
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
     */
    public function getTerm($request, $response, $args) {
        $ownerId = $request->getHeader('OwnerId')[0];
        $termId = $request->getHeader('TermId')[0];

        /**
         * @var EntityManager $em
         */
        $em = $this->getEmPrivacy($ownerId);

    }
}