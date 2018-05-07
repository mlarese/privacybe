<?php

namespace App\Entity\Config;


use Doctrine\ORM\Mapping as ORM;
use App\DoctrineEncrypt\Configuration\Encrypted;

/**
 * @ORM\Entity
 * @ORM\Table(name="enc")
 */
class Enc
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
     protected $id;

     /**
      * @ORM\Column(name="name", type="string", nullable=false)
      * @Encrypted
      */
     protected $name;

    /**
     * @return mixed
     */
    public function getSurname() {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname): void {
        $this->surname = $surname;
    }

     /**
      * @ORM\Column(name="surname", type="string", nullable=true)
      */
     protected $surname;
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Enc
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return Enc
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * @param mixed $form
     * @return Enc
     */
    public function setForm($form)
    {
        $this->form = $form;
        return $this;
    }

     /**
      * @ORM\Column(name="form", type="text", nullable=true)
      * @Encrypted
      */
     protected $form;
}
