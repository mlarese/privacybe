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

        $debug = [];

        $validTreatments = [];
        if(isset($criteria) && count($criteria['treatments'])>0) {
            foreach ($criteria['treatments'] as $tr) {
                if($tr['selected']) {
                    foreach($tr['terms'] as $term ) {
                        if($term['selected']) {
                            $validTreatments [$tr['code']][$term['uid']] = $term['selected'];

                            $debug[] = $tr['code'] .'#'.$term['uid'] ;

                            if($tr['code'] === 'newsletter') {
                                $validTreatments [$tr['code'].'s'][$term['uid']] = $term['selected'];
                                $debug[] = $tr['code'] .'s#'.$term['uid'] ;
                            }

                        }
                    }
                }
            }

            // print_r($debug);die;
            // print_r($validTreatments); die;
            $counter = 0;

            foreach ($list as &$pr ) {
                $includeRec = false;
                $pr['_flags_'] = [];
                // $pr['_flags_'] [] =  $validTreatments;

                foreach ($pr['privacyFlags'] as $f) {
                    $pr['_flags_'] [] = $f['code'] . ' # ' . $pr['termId'];
                    //$debug [] = $f['code'] . ' # ' . $pr['termId'];

                    if( isset($validTreatments[ $f['code'] ] [$pr['termId']])  ) {
                        $includeRec = true;
                        // echo $f['code'] . '#--' . $pr['termId'].' ';
                        // echo $f['code'] . ' # ' . $pr['termId'] . ' - ' . $pr['email'];
                        break;
                    }

                }

                if($includeRec) {
                    $counter++;
                    $pr['_counter_'] = $counter;
                    $ret[] = $pr;
                }
            }

        } else {
            $ret = &$list;
        }

        // print_r($debug);

        return $ret;
    }
}
