<?php
/**
 * Created by PhpStorm.
 * User: mauroadmin
 * Date: 06/04/18
 * Time: 07:25
 */

namespace App\Entity\Privacy;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="domain")
 */
class Domain
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     * @ORM\GeneratedValue(strategy="NONE")
     */
     protected $name;

     /**
      * @ORM\Column(name="description", type="string", nullable=false, length=255)
      */
     protected $description;

     /**
      * @ORM\Column(name="active", type="boolean", nullable=false)
      */
     protected $active=true;
}