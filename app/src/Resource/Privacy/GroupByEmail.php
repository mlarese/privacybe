<?php

namespace App\Resource\Privacy;


use App\Resource\IResultGrouper;

class GroupByEmail implements IResultGrouper
{
    public function group(&$list, $criteria){
        $res = [];
        foreach ($list as &$r) {
            $email = strtolower($r['email']);
            if(!isset(      $res      [$r['email']]    )) {
                            $res      [$r['email']]   = $r;
            }
        }

        unset($list);
        return $res;
    }
}



