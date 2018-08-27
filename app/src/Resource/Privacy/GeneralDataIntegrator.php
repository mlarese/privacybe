<?php

namespace App\Resource\Privacy;


use function trim;

class GeneralDataIntegrator
{
    public function integrate(&$record)
    {
        // $record['email'] = trim($record['email']);

        if(isset($record['domain']) && isset($record['site']))
           $record['page'] = "record['domain'].record['site']" ;


        if(isset($record['page']))
            $record['referrer'] = $record['page'];

        if(isset($record['privacy']['referrer']))
            $record['referrer'] =  $record['privacy']['referrer'];



        $record['denomination'] = $record['surname'].' '.$record['name'] ;

        $record['_flags_'] = [];
        foreach ($record['privacyFlags'] as $pf) {
            $record['_flags_'][] = ["code" => $pf['code'], "selected" => $pf['selected']];
        }

        return $record;
    }
}
