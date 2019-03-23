<?php
/**
 * Created by PhpStorm.
 * User: giuli
 * Date: 16/12/2018
 * Time: 13:39
 */

namespace App\Manager;

use Slim\App;
use GDPR\Base\BaseRoutesManager;
use Slim\Exception\ContainerValueNotFoundException;

class Module
{

    protected $modulename;

    /**
     * @var App
     */
    protected $slimapp;

    protected $loader;

    protected $namespace;

    protected $group;

    protected $routes;

    protected $mpath;

    protected $middleware;

    public function __construct($name, $app, $loader)
    {
        $this->modulename = $name;

        $this->slimapp = $app;

        $this->loader = $loader;
    }

    /**
     * @return mixed
     */
    public function getMiddleware()
    {
        return $this->middleware;
    }

    /**
     * @param mixed $middleware
     */
    public function setMiddleware($middleware): void
    {
        $this->middleware = $middleware;
    }


    public function setModulePath($value)
    {
        $this->mpath = $value;
    }

    public function setLoader($namespace)
    {

        $this->namespace = $namespace;
    }

    public function setRouteGroup($group)
    {
        $this->group = $group;
    }

    public function run()
    {

        $pathmodule = realpath($this->mpath . '/' . $this->modulename);

        $this->loader->set($this->namespace, array($pathmodule . '/src/'));

        $app = $this->slimapp;

        if (file_exists($pathmodule . '/config/dependencies.php')) {
            require $pathmodule . '/config/dependencies.php';
        }
        if (file_exists($pathmodule . '/config/routes.php')) {
            $routersettings = include $pathmodule . '/config/routes.php';
        } else {
            $routersettings = array();
        }


        $routeMngr = new BaseRoutesManager($app);


        if ($this->group === null) {
            $this->routes = $this->slimapp;
            foreach ($routersettings as $kr => $vs) {
                if ($vs['method'] == 'baseRoutes') {
                    $routeMngr->baseRoutes($vs['path'], $vs['class'], $vs['args'][0]);
                } else {
                    $method = $vs['method'];
                    $app->$method($vs['path'], $vs['class']);
                }
            }
        } else {
            $this->routes = $this->slimapp->group($this->group,
                function ($app) use ($routersettings) {

                    foreach ($routersettings as $kr => $vs) {
                        $method = $vs['method'];
                        $app->$method($vs['path'], $vs['class']);
                    }

                });
            /**
             * Aggiunta middleware dei gruppi
             */

            $middle = $this->getMiddleware();

            if ($middle !== null && !empty($middle)) {
                foreach ($middle as $value) {
                    try {
                        $middleware = $app->getContainer()->get('middleware-' . $value);
                        $this->routes->add($middleware);
                    } catch (ContainerValueNotFoundException $e) {

                    }

                }

            }

        }
    }
}