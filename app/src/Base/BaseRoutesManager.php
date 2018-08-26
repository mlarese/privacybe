<?php

namespace App\Base;


use Slim\App;

class BaseRoutesManager {
    /** @var App */
    private $app;

    /**
     * BaseRoutesManager constructor.
     *
     * @param App $app
     */
    public function __construct(App $app) { $this->app = $app; }


    public function baseRoutes(string $route, string $controller) {
        $routeId = "$route/{id}";

        /** @var App $app */
        $app = $this->app;
                $app->get($route ,"$controller:get" );
                $app->get($routeId ,"$controller:getById" );
                $app->put($routeId ,"$controller:put" );
                $app->post("$route" ,"$controller:post" );
                $app->delete($routeId ,"$controller:delete" );
    }
}
