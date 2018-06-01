<?php

namespace App\Resource;


interface IResultIntegrator
{
    public function integrate(&$record);
}