<?php

namespace App\Entity\Privacy;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *     name="operator",
 *     indexes={
 *          @ORM\Index(name="operator_name", columns={"name"}),
 *          @ORM\Index(name="operator_role", columns={"role"}),
 *          @ORM\Index(name="operator_period_from", columns={"period_from"}),
 *          @ORM\Index(name="operator_period_to", columns={"period_to"})
 *     }
 * )
 */

class Operator
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="NONE")
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
     * @return Operator
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
     * @return Operator
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
     * @return Operator
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
     * @return Operator
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
     * @return Operator
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
     * @return Operator
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
     * @return Operator
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
     *
     * @return Operator
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
     * @param $role
     * @return Operator
     */
    public function setRole($role) {
        $this->role = $role;
        return $this;
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
     *
     * @return Operator
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
      * @ORM\Column(name="period_from", type="datetime")
      */
     protected $periodFrom;

     /**
      * @ORM\Column(name="period_to", type="datetime")
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
     *
     * @return Operator
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
     *
     * @return Operator
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
     *
     * @return Operator
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

     /**
      * @ORM\Column(name="deleted", type="boolean", nullable=false, options={"default" = 0} )
      */
     protected $deleted;

     /**
      * @return mixed
      */
     public function getDeleted()
     {
         return $this->deleted;
     }

     /**
      * @param mixed $deleted
      * @return Operator
      */
     public function setDeleted($deleted)
     {
         $this->deleted = $deleted;
         return $this;
     }
    /**
     * @ORM\Column(name="active", type="boolean", nullable=false, options={"default" = 1})
     */
    protected $active;

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     * @return Operator
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

}
