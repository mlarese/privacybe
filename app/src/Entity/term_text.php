<?php
/**
 * Created by PhpStorm.
 * User: Courage
 * Date: 21/03/2018
 * Time: 16:22
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="term_text"))
 */


class term_text
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(name="term_id", type="integer")
     */
    protected $termId;
    /**
     * @ORM\Column(type="text")
     */
    protected $text;
    /**
     * @ORM\Column(type="string", length=4)
     */
    protected $language;

}