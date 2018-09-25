<?php

namespace App\Resource\Privacy;


use function is_array;
use function trim;

class GeneralDataIntegrator
{
    public function integrate(&$record)
    {
        // $record['email'] = trim($record['email']);

        if(isset($record['domain']) && isset($record['site']))
           $record['page'] = $record['domain'].$record['site'] ;


        if(isset($record['page']))
            $record['referrer'] = $record['page'];

        if(isset($record['privacy']['referrer']))
            $record['referrer'] =  $record['privacy']['referrer'];



        $record['denomination'] = $record['surname'].' '.$record['name'] ;

        $record['_flags_'] = [];


        if(is_array($record['privacyFlags']))
            foreach ($record['privacyFlags'] as $pf) {
                $unsub = false;
                $user='';
                if(isset($pf['unsubscribe']))  $unsub = true;
                if(isset($pf['user']))  $user = $pf['user'];

                $record['_flags_'][] = ["code" => $pf['code'], "selected" => $pf['selected'], "user" => $user, "unsubscribe" => $unsub, "mandatory" => $pf['mandatory']];

            }

        return $record;
    }
}
