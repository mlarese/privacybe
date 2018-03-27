<?php
/**
 * Created by PhpStorm.
 * User: mauroadmin
 * Date: 27/03/18
 * Time: 17:07
 */

namespace App\Action;


class AbstractAction
{
    protected $container;
    protected $em;

    public function __construct( $container) {
        $this->container = $container;
        $this->em = $container['em'];
    }

}