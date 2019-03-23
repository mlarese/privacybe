<?php

use Slim\App;
use Slim\Collection;


/**
 * @var Collection $settings
 */
$settings = $app->getContainer()->get('settings');

/** @var App $app */
$app->add( new \App\Manager\ApplicationMiddleware($settings['applications'],$app));


