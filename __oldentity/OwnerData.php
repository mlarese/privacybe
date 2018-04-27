<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *     name="owner_data"
 * )
 */
class OwnerData {
    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return OwnerData
     */
    public function setId($id) {
        $this->id = $id;
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
     * @return OwnerData
     */
    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOwner() {
        return $this->owner;
    }

    /**
     * @param Owner $owner
     *
     * @return OwnerData
     */
    public function setOwner($owner) {
        $this->owner = $owner;
        $this->id = $owner->getId();
        return $this;
    }

    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="NONE")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $email;


    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Owner", inversedBy="ownerData", fetch="LAZY")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     */
     protected $owner;
}