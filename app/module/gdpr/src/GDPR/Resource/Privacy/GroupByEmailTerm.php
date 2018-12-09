<?php

namespace GDPR\Resource\Privacy;


use GDPR\Resource\IResultGrouper;

class GroupByEmailTerm implements IResultGrouper
{
    public function group(&$list, $criteria){
        $res = [];
        foreach ($list as $r) {
            if(!isset(     $res      [$r['email']]   [$r['termId']]  [$r['domain'].$r['site']]       ))
                           $res      [$r['email']]   [$r['termId']]  [$r['domain'].$r['site']] = $r;
        }
        return $res;
    }
}



