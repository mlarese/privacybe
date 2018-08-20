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
        /** @var App $app */
        $app = $this->app;
        $app->group("/api", function () use ($app, $route, $controller) {
            $routeId = "$route/{id}";
                $app->get($route ,"$controller:get" );
                $app->get($routeId ,"$controller:get" );
                $app->put($routeId ,"$controller:put" );
                $app->post("$route" ,"$controller:post" );
                $app->delete($routeId ,"$controller:delete" );
        });
    }
}
