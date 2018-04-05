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
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
     protected $id;

    /**
     * @ORM\Column(name="paragraphs", type="json", nullable=true)
     */
    protected $paragraphs;
}