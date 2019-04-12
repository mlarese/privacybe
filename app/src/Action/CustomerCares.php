<?php

namespace App\Action;

use App\Entity\Config\ActionHistory;
use App\Entity\Config\CustomerCare;
use App\Entity\Config\Owner;
use App\Entity\Config\User;
use Doctrine\ORM\EntityManager;
use Slim\Http\Request;
use Slim\Http\Response;

class CustomerCares extends AbstractAction
{
    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     */
    public function getDblOptinList($request, $response, $args)
    {

        try {
            $rp = $this->getEmConfig()->getRepository(CustomerCare::class);


            $query="SELECT  count(*) AS items,
                dm.opened_year AS filter,
                sum(dm.price) AS value, 
                $sqlCasePaxType AS serie,
                $sqlCaseOrigin AS dimension
            
                ";

                $query = $em->createNativeQuery($sql, $rsm);
                return $query->getResult();



            $ccs = $rp->findBy(['deleted'=>0, 'active'=>1]);

            return $response->withJson(  $this->toJson($ccs));
        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Exception');
        }

    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     */
    public function getOperators($request, $response, $args)
    {

        try {
            $rp = $this->getEmConfig()->getRepository(CustomerCare::class);

            $ccs = $rp->findBy(['deleted'=>0, 'active'=>1]);

            return $response->withJson(  $this->toJson($ccs));
        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Exception');
        }

    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     */
    public function getOperator($request, $response, $args)
    {

        try {
            $id = $args['id'];
            $ccs = $this->getEmConfig()->find(CustomerCare::class,$id);


            return $response->withJson(  $this->toJson($ccs));
        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Exception');
        }

    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     */
    public function newOperator($request, $response, $args)
    {

        try {

            $body = $request->getParsedBody();

            if(
                !isset($body['user']) ||
                !isset($body['password'])
            ) {
                return $response->withStatus(500, 'Missing parameters');
            }

            $user = new User();
            $user->setName('Operatore '. $body['firstName']. ' ' .$body['lastName'])
                ->setActive(true)
                ->setDeleted(false)
                ->setPassword(md5($body['password']))
                ->setUser($body['user'])
                ->setType('operators')
                ->setOwnerId(0);

            $this->getEmConfig()->persist($user);
            $this->getEmConfig()->flush();

            $cc = new CustomerCare();
            $cc->setDeleted(false);
            $cc->setName($body['user']);
            $cc->setEmail($body['email']);
            $cc->setFirstName($body['firstName']);
            $cc->setLastName($body['lastName']);
            $cc->setActive(true);
            $cc->setId($user->getId());

            $this->getEmConfig()->persist($cc);
            $this->getEmConfig()->flush();


            $ud = $this->getUserData($request);

            $ah=new ActionHistory();
            $ah->setDate(new \DateTime())
                ->setType('operator creation')
                ->setUserName($ud->user)
                ->setDescription('operator '.$user->getUser())
            ;

            $this->getEmConfig()->persist($ah);
            $this->getEmConfig()->flush();

            return $response->withJson(  $this->toJson($this->success()));
        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Exception');
        }

    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     */
    public function updateOperator($request, $response, $args)
    {

        try {

            $body = $request->getParsedBody();
            $histField = [];

            /** @var CustomerCare $cc */
            $cc = $this->getEmConfig()->find(CustomerCare::class, $args['id']);

            $histField ['before']=$cc;
            $cc->setDeleted($body['deleted']);
            // $cc->setName($body['user']);
            $cc->setEmail($body['email']);
            $cc->setFirstName($body['firstName']);
            $cc->setLastName($body['lastName']);
            $cc->setActive($body['active']);

            $this->getEmConfig()->merge($cc);
            $this->getEmConfig()->flush();

            $ud = $this->getUserData($request);

            $histField ['after']=$cc;

            $objcc = $this->toJson($histField) ;

            $ah=new ActionHistory();
            $ah->setDate(new \DateTime())
                ->setType('operator update')
                ->setUserName($ud->user)
                ->setHistory($objcc)
                ->setDescription('operator '. $cc->getName())
            ;

            $this->getEmConfig()->persist($ah);
            $this->getEmConfig()->flush();

            return $response->withJson(  $this->toJson($this->success()));
        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Exception');
        }

    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     */
    public function getWidgets($request, $response, $args)
    {

        try {

        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Exception');
        }

    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     */
    public function getOwners($request, $response, $args)
    {

        try {
            $em = $this->getEmConfig();
            $rep = $em->getRepository(Owner::class);
            $owners = $rep->findBy(['deleted'=>false, 'active'=>true]);

            return $response->withJson($this->success($owners));

        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Exception');
        }

    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     */
    public function deactivate($request, $response, $args)
    {

        try {
            $id = $args['id'];
            $owners = $this->getEmConfig()->find(Owner::class,$id);

            $body = $request->getParsedBody();
            $owners->setActive($body[0]);


            $this->getEmConfig()->persist($owners);
            $this->getEmConfig()->flush();

            return $response->withJson(  $this->toJson($owners));

        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Exception');
        }

    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     */
    public function activate($request, $response, $args)
    {

        try {
            $id = $args['id'];
            $owners = $this->getEmConfig()->find(Owner::class,$id);

            $body = $request->getParsedBody();
            $owners->setActive($body[1]);


            $this->getEmConfig()->persist($owners);
            $this->getEmConfig()->flush();

            return $response->withJson(  $this->toJson($owners));

        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Exception');
        }

    }
}
