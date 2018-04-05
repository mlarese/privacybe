<?php
/**
 * Created by PhpStorm.
 * User: mauroadmin
 * Date: 27/03/18
 * Time: 17:07
 */

namespace App\Action;


use Doctrine\ORM\EntityManager;

class AbstractAction
{
    protected $container;
    /**
     * @var EntityManager
     */
    protected $emConfig;
    /**
     * @var EntityManager
     */
    protected $emPrivacy;

    public function __construct( $container) {
        $this->container = $container;
        $this->emConfig = $container['em-config'];
        $this->emPrivacy = $container['em-privacy'];
    }

}