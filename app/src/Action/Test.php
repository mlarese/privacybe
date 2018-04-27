<?php

namespace App\Action;


use Slim\Http\Request;
use Slim\Http\Response;

class Test extends AbstractAction
{
    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     */
    public function welcome($request, $response, $args) {
        return $response->withJson(["result" => "welcomw"]);
    }
}
