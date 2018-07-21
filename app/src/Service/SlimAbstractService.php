<?php
/**
 * Created by PhpStorm.
 * User: mauro.larese
 * Date: 16/07/2018
 * Time: 17:20
 */

namespace App\Service;


use Exception;
use Slim\App;

abstract class  SlimAbstractService {
    /** @var App $app */
    protected $app;

    public function config(App $app) {
        $this->app = $app;
    }

    public function autoConfig() {
        $localSettingsPath = __DIR__ . '/../../settings_local.php';
        $settingsPath = __DIR__ . '/../../settings.php';

        $settings = [];
        if(file_exists($localSettingsPath)) {
            $settings = require $localSettingsPath;
        } else {
            $settings = require $settingsPath;
        }

        $container = [];
        $app = new \Slim\App($settings);
        require __DIR__ . '/../../dependencies.php';

        $this->container = $container;
        $this->app = $app;
    }
    /**
     * @return \Slim\App
     */
    public function getApp(): \Slim\App {
        return $this->app;
    }

    /**
     * @param string $depName
     *
     * @return mixed
     * @throws DependencyNotFoundException
     */
    public function getDependency(string $depName) {
        try {
            return $this->getApp()->getContainer()->get($depName);
        } catch (Exception $e) {
            throw new DependencyNotFoundException("dependency $depName not found");
        }
    }
}
