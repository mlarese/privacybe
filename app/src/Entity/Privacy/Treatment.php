<?php
/**
 * Created by PhpStorm.
 * User: mauroadmin
 * Date: 05/04/18
 * Time: 23:37
 */

namespace App\Entity\Privacy;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="treatment")
 */
class Treatment
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", leength=30)
     * @ORM\GeneratedValue(strategy="NONE")
     */
     protected $code;
     
     /**
      * @ORM\Column(name="name", type="string", nullable=false)
      */
     protected $name;

}