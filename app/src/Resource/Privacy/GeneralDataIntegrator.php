<?php

namespace App\Resource\Privacy;


class GeneralDataIntegrator
{
    public function integrate(&$record)
    {
        $record['page'] = $record['domain'].$record['site'] ;
        $record['referrer'] = $record['page'];
        if(isset($record['privacy']['referrer']))
            $record['referrer'] =  $record['privacy']['referrer'];

        $record['denomination'] = $record['surname'].' '.$record['name'] ;

        return $record;
    }
}