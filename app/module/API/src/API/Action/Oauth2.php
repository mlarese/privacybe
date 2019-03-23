<?php

namespace API\Action;


use Chadicus\Slim\OAuth2\Http\RequestBridge;
use Chadicus\Slim\OAuth2\Http\ResponseBridge;
use Slim\Http\Request;
use Slim\Http\Response;

class Oauth2 {

    protected $container;
    protected $server;

    public function __construct( $container) {
        $this->container = $container;

        $this->server = $container->get("server-oauth2");

    }

    public function getAccessToken($request, $response, $args){


        $response = ResponseBridge::fromOAuth2(
            $this->server->handleTokenRequest(RequestBridge::toOAuth2($request))
        );

        if ($response->hasHeader('Content-Type')) {
            return $response;
        }

        return $response->withHeader('Content-Type', 'application/json');


    }

}