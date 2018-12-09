<?php

namespace GDPR\Resource\Privacy;


use GDPR\Resource\IResultIntegrator;

class TreatmentsIntegrator implements IResultIntegrator
{

    public function integrate(&$record)
    {

        return $record;

    }
}
