<?php

namespace App\Resource\Privacy;


use App\Resource\IResultGrouper;

class GroupByEmailTermMultiple implements IResultGrouper
{
    public function group(&$list, $criteria){
        $res = [];
        foreach ($list as $r) {
            if(!isset(     $res      [$r['email']]   [$r['termId']]  [$r['domain'].$r['site'].$r['id']]       ))
                           $res      [$r['email']]   [$r['termId']]  [$r['domain'].$r['site'].$r['id']] = $r;
        }
        return $res;
    }
}



