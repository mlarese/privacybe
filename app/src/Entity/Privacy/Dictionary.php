<?php

namespace App\Entity\Config;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="dictionary")
 */
class Dictionary
{
    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     *
     * @return Dictionary
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     *
     * @return Dictionary
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     *
     * @return Dictionary
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=50)
     * @ORM\GeneratedValue(strategy="NONE")
     */
     protected $code;

     /**
      * @ORM\Column(name="description", type="string", nullable=true)
      */
     protected $description;

     /**
      * @ORM\Column(name="data", type="json", nullable=true)
      */
     protected $data;
}
