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
     * @return mixed
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param mixed $uid
     * @return Term
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Term
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getParagraphs()
    {
        return $this->paragraphs;
    }

    /**
     * @param mixed $paragraphs
     * @return Term
     */
    public function setParagraphs($paragraphs)
    {
        $this->paragraphs = $paragraphs;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * @param mixed $pages
     * @return Term
     */
    public function setPages($pages)
    {
        $this->pages = $pages;
        return $this;
    }
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