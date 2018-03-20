<?php
namespace App\Action;

use Slim\Http\Request;
use Slim\Http\Response;
final class HomeAction
{

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     *
     * @return mixed
     */
    public function dispatch($request, $response, $args)
    {
        return "ciao";
        //return $response->withJson(["response"=>"ok"]);
    }
}
