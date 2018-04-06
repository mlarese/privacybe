<?php
/**
 * Created by PhpStorm.
 * User: mauroadmin
 * Date: 06/04/18
 * Time: 07:35
 */

namespace App\Entity\Privacy;


class Page
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     */
     protected $domain;

    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     */
    protected $page;
    
    /**
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    protected $active=true;
    
    /**
     * @ORM\Column(name="", type="", nullable=false)
     */
    protected $;
}