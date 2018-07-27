<?php

namespace App\Entity\Proxy;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="owner")
 */
class OwnerProxy {
    /**
     * @ORM\Column
     * @ORM\Id
     */
    protected $id;

    /**
     * @ORM\Column
     */
    protected $name;

    /**
     * @ORM\Column
     */
    protected $surname;

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return OwnerProxy
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param mixed $name
     *
     * @return OwnerProxy
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSurname() {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     *
     * @return OwnerProxy
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
     * @return OwnerProxy
     */
    public function setCompany($company) {
        $this->company = $company;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return OwnerProxy
     */
    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeleted() {
        return $this->deleted;
    }

    /**
     * @param mixed $deleted
     *
     * @return OwnerProxy
     */
    public function setDeleted($deleted) {
        $this->deleted = $deleted;
        return $this;
    }


    /**
     * @ORM\Column
     */
    protected $company;



    /**
     * @ORM\Column
     */
    protected $email;


    /**
     * @ORM\Column
     */
    protected $deleted;


}
