<?php
/**
 * Created by PhpStorm.
 * User: mauro.larese
 * Date: 12/04/2018
 * Time: 11:06
 */

namespace App\Action;


class Auth extends AbstractAction {
    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     */
    public function login($request, $response, $args) {
        return $response->withJson( array("login"=>"called", "token" => 'ssddddssd'));
    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     */
    public function logout($request, $response, $args) {
        return $response->withJson( array("logout"=>"called"));
    }


    public function user($request, $response, $args) {
        return $response->withJson(
            array(
                "user" => array(
                    "user" => "mauro.larese",
                    "userName" => "Larese Moro Mauro",
                    "role" => "owners"
                )
            ));
    }
}