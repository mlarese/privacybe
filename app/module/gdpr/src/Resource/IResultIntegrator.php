<?php

namespace GDPR\Resource;


interface IResultIntegrator
{
    public function integrate(&$record);
}