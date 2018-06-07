<?php
/**
 * Created by PhpStorm.
 * User: mauro.larese
 * Date: 07/06/2018
 * Time: 12:51
 */

namespace App\Action;


use Exception;
use Slim\Http\Request;
use Slim\Http\Response;

class UsersRequest  extends AbstractAction{

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     */
    public function newRequest($request, $response, $args){
        try {
            $body = $request->getParsedBody();

            rese

        } catch (Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error');
        }

    }

}
