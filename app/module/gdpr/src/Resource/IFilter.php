<?php
/**
 * Created by PhpStorm.
 * User: mauro.larese
 * Date: 01/06/2018
 * Time: 10:14
 */

namespace GDPR\Resource;


interface IFilter {
    /**
     * @param $list
     * @param $criteria
     *
     * @return mixed
     */
    public function filter(&$list, $criteria);
}
