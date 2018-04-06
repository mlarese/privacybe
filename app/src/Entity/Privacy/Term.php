<?php
/**
 * Created by PhpStorm.
 * User: mauroadmin
 * Date: 05/04/18
 * Time: 23:33
 */

namespace App\Entity\Privacy;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="term")
 */
class Term
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=128)
     * @ORM\GeneratedValue(strategy="NONE")
     */
     protected $uid;

     /**
      * @ORM\Column(name="name", type="string", nullable=false)
      */
     protected $name;

    /**
     * @ORM\Column(name="paragraphs", type="json", nullable=true)
     */
    protected $paragraphs;

    /**
     * @ORM\Column(name="pages", type="json_array", nullable=false)
     */
    protected $pages;
}