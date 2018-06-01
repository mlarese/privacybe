<?php

namespace App\Resource\Privacy;


use App\Resource\IResultGrouper;

class GroupByEmailTerm implements IResultGrouper
{
    public function group($list, $criteria){
        $res = [];
        foreach ($list as $r) {
            if(!isset(     $res      [$r['email']]   [$r['termId']]  [$r['domain'].$r['site']]       ))
                $res      [$r['email']]   [$r['termId']]  [$r['domain'].$r['site']] = $r;
        }
        return $res;
    }
}



