<?php
namespace App\Entity\Privacy;

use Doctrine\ORM\Mapping as ORM;
use App\DoctrineEncrypt\Configuration\Encrypted;

/**
 * @ORM\Table(
 *     name="privacy_entry",
 *     indexes={
 *          @ORM\Index(name="privacy_created", columns={"created"}),
 *          @ORM\Index(name="privacy_name_surname", columns={"name","surname"}),
 *          @ORM\Index(name="privacy_domain_site", columns={"domain","site"}),
 *          @ORM\Index(name="privacy_ref", columns={"domain","ref"}),
 *          @ORM\Index(name="privacy_page", columns={"page"}),
 *          @ORM\Index(name="privacy_version", columns={"version"}),
 *          @ORM\Index(name="privacy_status", columns={"status"}),
 *          @ORM\Index(name="privacy_term_id", columns={"domain","term_id"}),
 *          @ORM\Index(name="privacy_language", columns={"domain","language"}),
 *          @ORM\Index(name="privacy_email", columns={"email"})
 *     }
 * )
 * @ORM\Entity
 */
class Privacy {
    /**
     * @return mixed
     */
    public function getLanguage() {
        return $this->language;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param mixed $version
     * @return Privacy
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * @param mixed $properties
     * @return Privacy
     */
    public function setProperties($properties)
    {
        $this->properties = $properties;
        return $this;
    }

    /**
     * @param mixed $language
     *
     * @return Privacy
     */
    public function setLanguage($language) {
        $this->language = $language;
        return $this;
    }
    /**
     * @ORM\Id
     * @ORM\Column(name="uid", type="string", nullable=false, length=128)
     * @ORM\GeneratedValue(strategy="NONE")
     */
    public $id;

    /**
     * @ORM\Column(name="created", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    public $created;

    /**
     * @ORM\Column(name="email", type="string", nullable=false, length=100)
     */
    public $email;

    /**
     * @ORM\Column( type="integer", nullable=true,  options={"default" = 0} )
     */
    public $version;

    /**
     * @return mixed
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * @param mixed $status
     *
     * @return Privacy
     */
    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    /**
     * @ORM\Column(type="string", nullable=true, length=20)
     */
    public $status;

    /**
     * @ORM\Column(name="name", type="string", nullable=false, length=100)
     */
    public $name;

    /**
     * @ORM\Column(name="surname", type="string", nullable=false, length=100)
     */
    public $surname;

    /**
     * @ORM\Column(name="language", type="string", nullable=true, length=20)
     */
    public $language;

    /**
     * @ORM\Column(name="form", type="json", nullable=true)
     */
    public $form;

    /**
     * @ORM\Column(name="properties", type="json", nullable=true)
     */
    public $properties;
    /**
     * @ORM\Column(name="crypted_form", type="text", nullable=true, length=4294967295)
     * @Encrypted
     */
    public $cryptedForm;

    /**
     * @ORM\Column(name="privacy", type="json_array", nullable=true, length=4294967295)
     */
    public $privacy;

    /**
     * @ORM\Column(name="privacy_flags", type="json", nullable=true)
     */
    public $privacyFlags;

    /**
     * @ORM\Column(name="term_id", type="string", nullable=false)
     */
    public $termId;

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
    public $domain;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    public $page;

    /**
     * @ORM\Column(name="site", type="string", nullable=false, length=255)
     */
    public $site;

    /**
     * @return mixed
     */
    public function getPage() {
        return $this->page;
    }

    /**
     * @param mixed $page
     *
     * @return Privacy
     */
    public function setPage($page) {
        $this->page = $page;
        return $this;
    }

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
    public $ip;

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
     * @return mixed
     */
    public function getCryptedForm() {
        return $this->cryptedForm;
    }

    /**
     * @param mixed $cryptedForm
     *
     * @return Privacy
     */
    public function setCryptedForm($cryptedForm) {
        $this->cryptedForm = $cryptedForm;
        return $this;
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
    public $telephone;

    /**
     * @ORM\Column(name="deleted", type="boolean", nullable=false, options={"default" = 0} )
     */
    public $deleted;

    /**
     * @return mixed
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param mixed $deleted
     * @return Privacy
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
        return $this;
    }

    /**
     * @ORM\Column(name="ref", type="string", nullable=true, length=100)
     */
    public $ref;

    /**
     * @return mixed
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * @param mixed $ref
     * @return Privacy
     */
    public function setRef($ref)
    {
        $this->ref = $ref;
        return $this;
    }

    public function toArray() {
        return (array) $this;
    }
}
