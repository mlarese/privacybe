<?php

namespace App\Entity\Config;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(
 *     name="owner",
 *     uniqueConstraints={
 *          @ORM\UniqueConstraint(name="owner_uq_company", columns={"company"}),
 *          @ORM\UniqueConstraint(name="owner_uq_email", columns={"email"})
 *     },
 *     indexes={
 *          @ORM\Index(name="owner_name", columns={"name"})
 *     }
 * )
 */
class Owner {
    /**
     * @ORM\Id()
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @return mixed
     */
    public function getSurname() {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     *
     * @return Owner
     */
    public function setSurname($surname) {
        $this->surname = $surname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCompany() {
        return $this->company;
    }

    /**
     * @param mixed $company
     *
     * @return Owner
     */
    public function setCompany($company) {
        $this->company = $company;
        return $this;
    }
    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $name;

    /**
     * @ORM\Column(name="surname", type="string", nullable=true, length=100)
     */
    protected $surname;



    /**
     * @ORM\Column(name="company", type="string", nullable=false)
     */
    protected $company;


    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $email;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Owner
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
     * @return Owner
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return mixed
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param mixed $profile
     * @return Owner
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;
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
     * @return Owner
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @param mixed $email
     * @return Owner
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountry() {
        return $this->country;
    }

    /**
     * @param mixed $country
     *
     * @return Owner
     */
    public function setCountry($country) {
        $this->country = $country;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getZip() {
        return $this->zip;
    }

    /**
     * @param mixed $zip
     *
     * @return Owner
     */
    public function setZip($zip) {
        $this->zip = $zip;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress() {
        return $this->address;
    }

    /**
     * @param mixed $address
     *
     * @return Owner
     */
    public function setAddress($address) {
        $this->address = $address;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity() {
        return $this->city;
    }

    /**
     * @param mixed $city
     *
     * @return Owner
     */
    public function setCity($city) {
        $this->city = $city;
        return $this;
    }

    /**
     * @ORM\Column(name="profile", type="json", nullable=true)
     */
    protected $profile;

    /**
     * @ORM\Column(name="language", type="string", nullable=true)
     */
    protected $language;

    /**
     * @ORM\Column(name="country", type="string", nullable=true, length=4)
     */
    protected $country;

    /**
     * @ORM\Column(name="zip", type="string", nullable=true, length=20)
     */
    protected $zip;

    /**
     * @ORM\Column(name="address", type="string", nullable=true)
     */
    protected $address;

    /**
     * @ORM\Column(name="city", type="string", nullable=true)
     */
    protected $city;

    /**
     * @ORM\Column(name="deleted", type="boolean", nullable=false, options={"default" = 0} )
     */
    protected $deleted=0;

    /**
     * @return mixed
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param mixed $deleted
     * @return Owner
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
        return $this;
    }

    /**
     * @ORM\Column(name="active", type="boolean", nullable=false, options={"default" = 1})
     */
    protected $active=1;

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     * @return Owner
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCounty() {
        return $this->county;
    }

    /**
     * @param mixed $county
     *
     * @return Owner
     */
    public function setCounty($county) {
        $this->county = $county;
        return $this;
    }

    /**
     * @ORM\Column(name="county", type="string", nullable=true, length=120)
     */
    protected $county;

    /**
     * @return mixed
     */
    public function getDomains() {
        if(!isset($this->domains)) {
            $this->domains = [];
        }
        return $this->domains;
    }

    /**
     * @param mixed $domains
     *
     * @return Owner
     */
    public function setDomains($domains) {
        $this->domains = $domains;
        return $this;
    }

    /**
     * @var $domains
     */
    protected $domains;

}
