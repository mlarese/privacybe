<?php

namespace App\Resource\Privacy;


use App\Resource\IResultIntegrator;
use App\Action\Terms;

class TermIntegrator implements IResultIntegrator
{

    private $termPageMap;
    private $termMap;

    /**
     * TermIntegrator constructor.
     * @param $termPageMap
     * @param $termMap
     */
    public function __construct($termPageMap, $termMap)
    {
        $this->termPageMap=$termPageMap;
        $this->termMap=$termMap;
    }

    public function integrate(&$record)
    {

        $termIdFromPages = '0';
        if(isset($this->termPageMap[$record['domain']][$record['site']])) {
            $termIdFromPages = $this->termPageMap[$record['domain']][$record['site']];
        }

        if($record['termId']==='0') {
            if(isset($record['privacy']['termId'])) {
                $record['termId'] = $record['privacy']['termId'];
            } else {
                $record['termId'] = $termIdFromPages;
            }
        }
        if($record['termId']==='0') {
            $record['termId']= Terms::ABS_DEFAULT_TERM_CODE;
        }


        /***********************************************/
        /***************** term name *******************/

        $uid = $record['termId'];
        if(isset($uid) && "$uid"!="0") {
            if(isset($this->termMap[$uid])) {
                //$record['termName'] = $this->termMap[$uid]['name'];

                $record['termName'] =$this->termMap[$uid]['name'];

            } else {
                $record['termName'] =  Terms::ABS_DEFAULT_TERM_NAME;
            }
        } else {
            $record['termName'] = Terms::ABS_DEFAULT_TERM_NAME;
        }

        /***************** term name *******************/
        /***********************************************/

        return $record;

    }
}
