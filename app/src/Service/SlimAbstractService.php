<?php
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
        $app = new App($settings);
        require __DIR__ . '/../../dependencies.php';

        $this->container = $container;
        $this->app = $app;
    }
    /**
     * @return App
     */
    public function getApp(): App {
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
