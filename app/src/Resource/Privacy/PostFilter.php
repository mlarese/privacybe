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
                foreach ($pr['privacyFlags'] as $f) {
                    if( isset($validTreatments[ $f['code'] ] [$pr['termId']])  ) {
                        if(  $f['selected']) {
                            $includeRec = true;
                            break;
                        }
                    }

                }

                if($includeRec && isset($criteria['language']) && $criteria['language']!=='' && $criteria['language']!=='all') {
                    $language = $criteria['language'] ;

                     if($pr['language']!== $criteria['language']) {
                         $includeRec = false;
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
