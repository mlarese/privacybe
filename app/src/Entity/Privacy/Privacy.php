<?php
namespace App\Entity\Privacy;

use Doctrine\ORM\Mapping as ORM;
use DoctrineEncrypt\Configuration\Encrypted;

/**
 * @ORM\Table(
 *     name="privacy_entry",
 *     indexes={
 *          @ORM\Index(name="privacy_created", columns={"created"}),
 *          @ORM\Index(name="privacy_name_surname", columns={"name","surname"}),
 *          @ORM\Index(name="privacy_domain_site", columns={"domain","site"}),
 *          @ORM\Index(name="privacy_email", columns={"email"})
 *     }
 * )
 * @ORM\Entity
 */
class Privacy {
    /**
     * @ORM\Id
     * @ORM\Column(name="uid", type="string", nullable=false, length=120)
     * @ORM\GeneratedValue(strategy="NONE")
     */
    protected $id;

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
     * @ORM\Column(name="form", type="json", nullable=true)
     */
    protected $form;

    /**
     * @ORM\Column(name="privacy", type="json", nullable=false)
     */
    protected $privacy;

    /**
     * @ORM\Column(name="privacy_flags", type="json", nullable=false)
     */
    protected $privacyFlags;

    /**
     * @ORM\Column(name="term_id", type="string", nullable=false)
     */
    protected $termId;

    /**
     * @return mixed
     */
    public function getTermId() {
        return $this->termId;
    }

    /**
     * @param mixed $termId
     *
     * @return Privacy
     */
    public function setTermId($termId) {
        $this->termId = $termId;
        return $this;
    }
    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $domain;

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
     * @return Privacy
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
     * @return Privacy
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
     * @return Privacy
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
     * @return Privacy
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
     * @return Privacy
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
     * @return Privacy
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
     * @return Privacy
     */
    public function setPrivacy($privacy) {
        $this->privacy = $privacy;
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
     * @return Privacy
     */
    public function setSite($site) {
        $this->site = $site;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrivacyFlags() {
        return $this->privacyFlags;
    }

    /**
     * @param mixed $privacyFlags
     */
    public function setPrivacyFlags($privacyFlags) {
        $this->privacyFlags = $privacyFlags;
        return $this;
    }

    /**
     * @var $ip  string
     *
     * @ORM\Column(name="ip", type="string", nullable=true, length=100)
     */
    protected $ip;

    /**
     * @return mixed
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param mixed $domain
     * @return Privacy
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
        return $this;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     * @return Privacy
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
        return $this;
    }

    /**
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     * @return Privacy
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
        return $this;
    }

    /**
     * @var $telephone  string
     * @ORM\Column(name="telephone", type="string", nullable=true, length=120)
     */
    protected $telephone;
}
