<?php
/**
 * Created by PhpStorm.
 * User: mauroadmin
 * Date: 17/04/18
 * Time: 22:01
 */

namespace App\Entity\Privacy;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="responsible")
 */

class Responsible
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=128)
     * @ORM\GeneratedValue(strategy="NONE")
     */
     protected $uid;

     /**
      * @ORM\Column(name="name", type="string", nullable=false, length=80)
      */
     protected $name;

     /**
      * @ORM\Column(name="surname", type="string", nullable=false, length=80)
      */
     protected $surname;


     /**
      * @ORM\Column(name="zip", type="string", nullable=false, length=10)
      */
     protected $zip;

     /**
      * @ORM\Column(name="email", type="string", nullable=true, length=150)
      */
     protected $email;

    /**
     * @return mixed
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param mixed $uid
     * @return Responsible
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
     * @return Responsible
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     * @return Responsible
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param mixed $zip
     * @return Responsible
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return Responsible
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     * @return Responsible
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     * @return Responsible
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     * @return Responsible
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

     /**
      * @ORM\Column(name="telephone", type="string", nullable=true, length=100)
      */
     protected $telephone;

     /**
      * @ORM\Column(name="city", type="string", nullable=true, length=100)
      */
     protected $city;

     /**
      * @ORM\Column(name="address", type="string", nullable=true)
      */
     protected $address;

     /**
      * @ORM\Column(name="role", type="string", nullable=false, length=50)
      */
     protected $role;
}