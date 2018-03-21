<?php
/**
 * Created by PhpStorm.
 * User: Courage
 * Date: 19/03/2018
 * Time: 18:03
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="role")
 */

class role
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(name="string", length=100)
     */
    protected $name;
    /**
     * @ORM\Column(name="string", length=20)
     */
    protected $code;


}