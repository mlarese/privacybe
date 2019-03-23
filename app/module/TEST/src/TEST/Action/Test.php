<?php

namespace TEST\Action;


use GDPR\Action\AbstractAction;
use GDPR\Traits\UrlHelpers;
use Slim\Http\Request;
use Slim\Http\Response;

class Test extends AbstractAction
{

    use UrlHelpers;


    /**
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return Response
     */
    public function testAnotherMiddleware(Request $request, Response $response, $args)
    {

        $c = $request->getCookieParams();
        return $response->withJson(["result" => "welcome", 'c' => $c]);
    }
}
