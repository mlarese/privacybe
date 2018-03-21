<?php
/**
 * Created by PhpStorm.
 * User: Courage
 * Date: 19/03/2018
 * Time: 18:06
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class user
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $user_name;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $password;

}