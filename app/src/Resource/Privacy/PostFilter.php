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
        return $list;
    }
}
