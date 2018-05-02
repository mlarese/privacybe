<?php

namespace App\Entity\Privacy;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="responsible")
 */

class Delegate
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
     protected $id;

     /**
      * @ORM\Column(name="name", type="string", nullable=false, length=80)
      */
     protected $name;

     /**
      * @ORM\Column(name="surname", type="string", nullable=false, length=80)
      */
     protected $surname;


     /**
      * @ORM\Column(name="zip", type="string", nullable=true, length=10)
      */
     protected $zip;

     /**
      * @ORM\Column(name="email", type="string", nullable=true, length=150)
      */
     protected $email;



    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return Delegate
     */
    public function setId($id) {
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
     *
     * @return Delegate
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
     *
     * @return Delegate
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
     *
     * @return Delegate
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
     *
     * @return Delegate
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
     *
     * @return Delegate
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
     *
     * @return Delegate
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
     * @return Delegate
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
     * @return mixed
     */
    public function getRole() {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role) {
        $this->role = $role;
    }

     /**
      * @ORM\Column(name="city", type="string", nullable=true, length=100)
      */
     protected $city;

     /**
      * @ORM\Column(name="address", type="string", nullable=true)
      */
     protected $address;

    /**
     * @return mixed
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param mixed $profile
     * @return Delegate
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;
        return $this;
    }

     /**
      * @ORM\Column(name="role", type="string", nullable=false, length=50)
      */
     protected $role;

     /**
      * @ORM\Column(name="profile", type="json", nullable=true)
      */
     protected $profile;

     /**
      * @ORM\Column(name="periodFrom", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
      */
     protected $periodFrom;

     /**
      * @ORM\Column(name="periodTo", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
      */
     protected $periodTo;

    /**
     * @return mixed
     */
    public function getPeriodFrom()
    {
        return $this->periodFrom;
    }

    /**
     * @param mixed $periodFrom
     * @return Delegate
     */
    public function setPeriodFrom($periodFrom)
    {
        $this->periodFrom = $periodFrom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPeriodTo()
    {
        return $this->periodTo;
    }

    /**
     * @param mixed $periodTo
     * @return Delegate
     */
    public function setPeriodTo($periodTo)
    {
        $this->periodTo = $periodTo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDomains()
    {
        return $this->domains;
    }

    /**
     * @param mixed $domains
     * @return Delegate
     */
    public function setDomains($domains)
    {
        $this->domains = $domains;
        return $this;
    }

     /**
      * @ORM\Column(name="domains", type="json", nullable=true)
      */
     protected $domains;

}
