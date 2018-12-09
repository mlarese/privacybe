<?php

namespace GDPR\Resource\Privacy;


use GDPR\Resource\IResultGrouper;

class GroupByEmail implements IResultGrouper
{
    public function group(&$list, $criteria){
        $res = [];
        foreach ($list as &$r) {
            $email = strtolower($r['email']);
            if(!isset(      $res      [$email]    )) {
                            $res      [$email]   = $r;
            }
        }

        unset($list);
        return $res;
    }
}



