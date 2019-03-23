<?php
/**
 * Created by PhpStorm.
 * User: giuli
 * Date: 16/12/2018
 * Time: 13:40
 */

namespace App\Manager;

/**
 * Class ModuleBuilder
 * @package App\Manager
 */
class ModuleBuilder
{

    protected $modules;

    protected $mbasepath;

    protected $loader;

    protected $app;

    protected $path;

    public function setApp($app)
    {
        $this->app = $app;
    }

    public function setLoader($loader)
    {
        $this->loader = $loader;
    }

    public function setPath($path)
    {
        $this->path = $path;
    }

    public function setModuleBasePath($path)
    {
        $this->mbasepath = $path;
    }

    public function build()
    {

        $modules = require $this->path . '/modules.php';


        foreach ($modules as $module) {
            $nModule = new Module($module['name'], $this->app, $this->loader);

            $nModule->setModulePath($this->mbasepath);

            if (file_exists($this->mbasepath)) {
                $nModule->setLoader($module['namespace']);
                $nModule->setRouteGroup($module['group']);
                if (isset($module['middleware'])) {
                    $nModule->setMiddleware($module['middleware']);
                }
            }

            $this->modules[] = $nModule;
        }
    }

    public function getModules()
    {

        return $this->modules;
    }
}