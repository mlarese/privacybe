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

class TermFlagText
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(name="term_flag_id", type="integer")
     */
    protected $termFlagId;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return TermFlagText
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTermFlagId()
    {
        return $this->termFlagId;
    }

    /**
     * @param mixed $termFlagId
     * @return TermFlagText
     */
    public function setTermFlagId($termFlagId)
    {
        $this->termFlagId = $termFlagId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     * @return TermFlagText
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param mixed $language
     * @return TermFlagText
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }
    /**
     * @ORM\Column(type="string", length=200)
     */
    protected $text;
    /**
     * @ORM\Column(type="string", length=4)
     */
    protected $language;



}