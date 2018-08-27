<?php
namespace App\Traits;


use App\Env\Env;

trait Environment {
    public function detectEnvironment() {
        $whitelist = array('127.0.0.1', "::1", "localhost");

        if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist))
            return Env::ENV_DEV;
        else
            return Env::ENV_PROD;
    }
}
