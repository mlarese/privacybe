<?php

namespace App\Base;


use App\Action\AbstractAction;
use Doctrine\ORM\EntityManager;
use Slim\Http\Request;
use Slim\Http\Response;


abstract class BaseAction extends AbstractAction
{
    use BaseResource;

    /** @var Request */
    private $request;
    /** @var Response */
    private $response;
    private $args;
    protected function setActionParams(Request $request, Response $response, $args) {
        $this->request=$request;
        $this->response=$response;
        $this->args=$args;
    }
    /**
     * BaseAction constructor.
     */
    public function __construct()
    {
        $this->setClazz($this->clazz());
        $this->setBaseParams($this->baseParams());
    }

    abstract public function clazz();
    abstract function baseParams ();

    public function get (Request $request, Response $response, $args){

        try {
            $this->setActionParams($request, $response, $args);
            $this->injectEntityManager();
            $this->beforeGet($args);
            $recordset = $this->findBy($args);
            $this->afterGet($recordset);
            return $response->withJson( $this->toJson( $recordset));
        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error finding records');
        }

    }

    protected function checkMandatory($values) {
        $man = $this->mandatoryFields();
        foreach ($man as $m) {

        }
        return true;
    }

    public function injectEntityManager(){
        if(strpos($this->getClazz(),"App\Entity\Privacy")) {
            try {
                $ownerId = $this->getOwnerId($this->request);
            } catch (\Exception $e) { }

            if(!isset($ownerId) && isset($this->args['ownerId']))
                $ownerId =$this->args['ownerId'];
            else if(!isset($ownerId) && $this->request->getParam('ownerId'))
                $ownerId =$this->request->getParam('ownerId');

            $this->setEm($this->getEmPrivacy($ownerId));
        } else {
            $this->setEm(  $this->getEmConfig());
        }
    }
    public function beforeGet (&$params){}
    public function afterGet (&$recordset){}
    public function beforeSave (&$values){}
    abstract public function mandatoryFields();
    public function validate ($values) {return true;}
    public function post (Request $request, Response $response, $args){
        try {
            $this->setActionParams($request, $response, $args);
            $this->injectEntityManager();
            $body = $request->getParsedBody();
            if(!$this->validate($body)) throw new \Exception('Mandatory field missing');
            $this->beforeSave($body);
            $this->create($body);
            $this->flush();
            return  $response->withJson( $this->success());
        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error creating record');
        }
    }
    public function put (Request $request, Response $response, $args){
        try {
            $this->setActionParams($request, $response, $args);
            $this->injectEntityManager();
            $body = $request->getParsedBody();
            if(!$this->validate($body)) throw new \Exception('Mandatory field missing');
            $this->beforeSave($body);
            $this->update($body,$args);
            $this->flush();
            return  $response->withJson( $this->success());
        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error creating record');
        }
    }
    public function delete (Request $request, Response $response, $args){

        try {
            $this->setActionParams($request, $response, $args);
            $this->injectEntityManager();
            $this->remove($args);
            return  $response->withJson( $this->success());
        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error deleting record');
        }

    }


}
