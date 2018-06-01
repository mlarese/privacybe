<?php

namespace App\Resource\Privacy;


use App\Resource\IResultIntegrator;

class TreatmentsIntegrator implements IResultIntegrator
{

    public function integrate(&$record)
    {

        return $record;

    }
}
