<?php

namespace App\Action;

use App\Entity\Privacy\Treatment;
use Doctrine\ORM\EntityManager;
use Slim\Http\Request;
use Slim\Http\Response;

class Treatments extends AbstractAction{
    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     */
    public function getAllTreatments($request, $response, $args) {
        $ownerId = $this->getOwnerId($request);

        /**
         * @var EntityManager $em
         */
        $em = $this->getEmPrivacy($ownerId);

        $term = null;
        try {
            $term =  $em->getRepository( Treatment::class)->findAll();
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
    public function getTreatment($request, $response, $args) {
        $ownerId = $this->getOwnerId($request);
        $treatmentCode = $args['code'];

        /**
         * @var EntityManager $em
         */
        $em = $this->getEmPrivacy($ownerId);

        $term = $em->find(Treatment::class, $treatmentCode);

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
    public function newTreatment($request, $response, $args) {
        $body = $request->getParsedBody();
        $ownerId = $this->getOwnerId($request);

        $em = $this->getEmPrivacy($ownerId);

        $nt = new Treatment();

        try {

            $nt
                ->setCode($this->getAttribute('code',$body, true))
                ->setName($this->getAttribute('name',$body, true))
                ->setCreator($this->getAttribute('creator',$body))
                ->setNote($this->getAttribute('note',$body))
                ->setCreated(new \DateTime())
            ;

            $em->persist($nt);
            $em->flush();

            return $response->withJson($this->success());
        } catch (\Exception $e) {
            $response->withStatus(500, 'Error saving treatment');
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
    public function updateTreatment($request, $response, $args) {
        $code = $args['code'];
        $body = $request->getParsedBody();
        $ownerId = $this->getOwnerId($request);

        $em = $this->getEmPrivacy($ownerId);

        try {
            $nt = $em->find(Treatment::class, $code);

            $nt
                ->setName($this->getAttribute('name',$body, true))
                ->setNote($this->getAttribute('note',$body))
            ;

            $em->merge($nt);
            $em->flush();

            return $response->withJson($this->success( $this->toJson( $body )));
        } catch (\Exception $e) {
            $response->withStatus(500, 'Error saving treatment');
        }
    }

}