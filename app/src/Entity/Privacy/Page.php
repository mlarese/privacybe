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
     * @return mixed
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param mixed $domain
     * @return Page
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param mixed $page
     * @return Page
     */
    public function setPage($page)
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     * @return Page
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     */
    protected $page;
    
    /**
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    protected $active=true;
    

}