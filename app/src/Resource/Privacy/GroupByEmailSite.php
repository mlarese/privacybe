<?php

namespace App\Resource\Privacy;


use App\Resource\IResultGrouper;

class GroupByEmailSite implements IResultGrouper
{
    public function group(&$list, $criteria){
        $res = [];
        foreach ($list as $r) {
            if(!isset(     $res      [$r['email']]       [$r['domain'].$r['site']]       ))
                           $res      [$r['email']]       [$r['domain'].$r['site']]   = $r;
        }
        return $res;
    }
}



