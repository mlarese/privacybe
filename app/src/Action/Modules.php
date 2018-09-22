<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 9/21/18
 * Time: 4:12 PM
 */

namespace App\Action;


use App\Entity\Config\Module;

class Modules extends AbstractAction
{
    public function getAllModules(Request $request, Response $response, $args) {
        try {
            $em =$this->getEmConfig();
            $rep =$em->getRepository(Module::class);
            $module = $rep->findBy();
            return $response->withJson($this->toJson($module));

        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error getting module');
        }
    }

    public function getModule(Request $request, Response $response, $args) {
        try {

            $id = $args['id'];
            $module = $this->getEmConfig();
            $module->getRepository(Module::class)->find($id);
            return $response->withJson( $this->toJson($module));


        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error getting module');
        }
    }

    public function updateModule(Request $request, Response $response, $args) {
        try {

        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error getting module');
        }
    }

    public function insertModule(Request $request, Response $response, $args) {
        try {
            $body = $request->getParsedBody();

            $this->getEmConfig()->persist();
            $this->getEmConfig()->flush();


        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error getting module');
        }
    }

    public function moduleDelete(Request $request, Response $response, $args) {
        try {

        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error getting module');
        }
    }

}
