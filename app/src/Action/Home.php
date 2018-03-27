<?php
/**
 * Created by PhpStorm.
 * User: mauroadmin
 * Date: 27/03/18
 * Time: 16:05
 */

namespace App\Action;


use Slim\Http\Request;
use Slim\Http\Response;

class Home extends AbstractAction
{

    /**
     * @param $request Request
     * @param $response Response
     */
    public function welcome($request, $response, $args) {
        return $response->withJson(['response'=>'welcome']);
    }

    public function welcomepost($request, $response, $args) {
        return $response->withJson(['response'=>'welcomepost']);
    }

}