<?php
namespace App\Entity\Proxy;

use Doctrine\ORM\Mapping as ORM;
use App\DoctrineEncrypt\Configuration\Encrypted;

/**
 * @ORM\Table( name="privacy_deferred"  )
 * @ORM\Entity
 */
class PrivacyDeferredProxy {
    /**
     * @ORM\Column(name="uid", type="string", nullable=false, length=128)
     * @ORM\Id
     */
    protected $id;

    /**
     * @ORM\Column(name="privacy_id", type="string", nullable=false, length=128)
     */
    protected $privacyId;


    /**
     * @ORM\Column(name="created", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    protected $created;

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPrivacyId() {
        return $this->privacyId;
    }

    /**
     * @param mixed $privacyId
     */
    public function setPrivacyId($privacyId): void {
        $this->privacyId = $privacyId;
    }

    /**
     * @return mixed
     */
    public function getCreated() {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created): void {
        $this->created = $created;
    }

    /**
     * @return mixed
     */
    public function getUpdated() {
        return $this->updated;
    }

    /**
     * @param mixed $updated
     */
    public function setUpdated($updated): void {
        $this->updated = $updated;
    }

    /**
     * @return mixed
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void {
        $this->name = $name;
    }

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
     * @return mixed
     */
    public function getLanguage() {
        return $this->language;
    }

    /**
     * @param mixed $language
     */
    public function setLanguage($language): void {
        $this->language = $language;
    }

    /**
     * @return mixed
     */
    public function getDeleted() {
        return $this->deleted;
    }

    /**
     * @param mixed $deleted
     */
    public function setDeleted($deleted): void {
        $this->deleted = $deleted;
    }

    /**
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     */
    protected $updated;

    /**
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    protected $status;

    /**
     * @ORM\Column(name="type", type="string", nullable=false, length=100)
     */
    protected $type;

    /**
     * @ORM\Column(name="email", type="string", nullable=false, length=100)
     */
    protected $email;

    /**
     * @ORM\Column(name="name", type="string", nullable=false, length=100)
     */
    protected $name;

    /**
     * @ORM\Column(name="surname", type="string", nullable=false, length=100)
     */
    protected $surname;

    /**
     * @ORM\Column(name="language", type="string", nullable=true, length=20)
     */
    protected $language;

    /**
     * @ORM\Column(name="deleted", type="boolean", nullable=false, options={"default" = 0} )
     */
    protected $deleted;

}
