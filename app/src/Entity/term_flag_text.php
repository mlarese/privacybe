<?php
/**
 * Created by PhpStorm.
 * User: Courage
 * Date: 19/03/2018
 * Time: 23:53
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="term_flag_text")
 */

class term_flag_text
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\termFlagId
     * @ORM\Column(name="term_flag_id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $termFlagId;
    /**
     * @ORM\Column(type="string", length=200)
     */
    protected $text;
    /**
     * @ORM\Column(type="string", length=4)
     */
    protected $language;



}