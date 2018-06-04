<?php
/**
 * Created by PhpStorm.
 * User: mauro.larese
 * Date: 01/06/2018
 * Time: 10:15
 */

namespace App\Resource\Privacy;


use App\Resource\IFilter;

class PostFilter implements IFilter {

    /**
     * @param $list
     * @param $criteria
     *
     * @return mixed
     */
    public function filter(&$list, $criteria) {
        $ret = [];

        $validTreatments = [];
        if(isset($criteria)) {
            foreach ($criteria['treatments'] as $tr) {
                if($tr['selected']) {
                    foreach($tr['terms'] as $term ) {
                        if($term['selected']) {
                            $validTreatments [$tr['code']][$term['uid']] = true;
                        }
                    }

                }
            }

            foreach ($list as &$pr ) {
                $includeRec = true;

                foreach ($pr['privacyFlags'] as $f) {
                    if( isset($validTreatments[ $f['code'] ] [$pr['termId']])  ) {
                        $includeRec = true;
                        // echo $f['code'] . ' # ' . $pr['termId'] . ' - ' . $pr['email'];
                        break;
                    }
                }

                if($includeRec) $ret[] = $pr;
            }

        } else {
            $ret = &$list;
        }

        return $ret;
    }
}
