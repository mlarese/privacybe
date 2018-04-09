<?php
namespace App\Entity\Privacy;

use Doctrine\ORM\Mapping as ORM;

/**
 * privacyEntry
 * @ORM\Table(name="privacy_entry")
 * @ORM\Entity
 */
class PrivacyEntry {
    /**
     * @ORM\Id
     * @ORM\Column(name="uid", type="string", nullable=false, length=120)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="created", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    protected $created;

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
     * @ORM\Column(name="form", type="text", nullable=true)
     */
    protected $form;

    /**
     * @ORM\Column(name="privacy", type="text", nullable=false)
     */
    protected $privacy;

    /**
     * @ORM\Column(name="term_id", type="string", nullable=false, length=128)
     */
    protected $termId;

    /**
     * @ORM\Column(name="site", type="string", nullable=false, length=255)
     */
    protected $site;

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return PrivacyEntry
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreated() {
        return $this->created;
    }

    /**
     * @param mixed $created
     *
     * @return PrivacyEntry
     */
    public function setCreated($created) {
        $this->created = $created;
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
     * @return PrivacyEntry
     */
    public function setEmail($email) {
        $this->email = $email;
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
     * @return PrivacyEntry
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
     * @return PrivacyEntry
     */
    public function setSurname($surname) {
        $this->surname = $surname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getForm() {
        return $this->form;
    }

    /**
     * @param mixed $form
     *
     * @return PrivacyEntry
     */
    public function setForm($form) {
        $this->form = $form;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrivacy() {
        return $this->privacy;
    }

    /**
     * @param mixed $privacy
     *
     * @return PrivacyEntry
     */
    public function setPrivacy($privacy) {
        $this->privacy = $privacy;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTermId() {
        return $this->termId;
    }

    /**
     * @param mixed $termId
     *
     * @return PrivacyEntry
     */
    public function setTermId($termId) {
        $this->termId = $termId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSite() {
        return $this->site;
    }

    /**
     * @param mixed $site
     *
     * @return PrivacyEntry
     */
    public function setSite($site) {
        $this->site = $site;
        return $this;
    }
}