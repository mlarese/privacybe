<?php
/**
 * Created by PhpStorm.
 * User: mauro.larese
 * Date: 26/04/2018
 * Time: 12:26
 */

namespace App\Entity\Config;

/**
 * user
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User {
    /**
     * @ORM\Id
     * @ORM\Column(name="user", type="string", nullable=false, length=100)
     * @ORM\GeneratedValue(strategy="NONE")
     */
    protected $user;

    /**
     * @var $password  string
     * @ORM\Column(name="password", type="string", nullable=false)
     */
    protected $password;

    /**
     * @var $type  string values: admin, operator, delegate, owner
     * @ORM\Column(name="type", type="string", nullable=false, length=50)
     */
    protected $type;

    /**
     * @var $ownerId  int
     * null for admin and operator
     * @ORM\Column(name="owner_id", type="int", nullable=true)
     */
    protected $ownerId;
    

}
