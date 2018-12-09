<?php
namespace GDPR\Entity\Privacy;

use Doctrine\ORM\Mapping as ORM;
use GDPR\DoctrineEncrypt\Configuration\Encrypted;

/**
 * @ORM\Table(
 *     name="privacy_deferred",
 *     indexes={
 *          @ORM\Index(name="privacy_deferred_created", columns={"created"}),
 *          @ORM\Index(name="privacy_deferred_type", columns={"type"}),
 *          @ORM\Index(name="privacy_deferred_privacy_id", columns={"privacy_id"}),
 *          @ORM\Index(name="privacy_deferred_status", columns={"status"}),
 *          @ORM\Index(name="privacy_deferred_email", columns={"email"})
 *     }
 * )
 * @ORM\Entity
 */
class PrivacyDeferred {
    /**
     * @return mixed
     */
    public function getLanguage() {
        return $this->language;
    }

    /**
     * @param mixed $language
     *
     * @return PrivacyDeferred
     */
    public function setLanguage($language) {
        $this->language = $language;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrivacyId() {
        return $this->privacyId;
    }

    /**
     * @param mixed $privacyId
     *
     * @return PrivacyDeferred
     */
    public function setPrivacyId($privacyId) {
        $this->privacyId = $privacyId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @param mixed $type
     *
     * @return PrivacyDeferred
     */
    public function setType($type) {
        $this->type = $type;
        return $this;
    }
    /**
     * @ORM\Id
     * @ORM\Column(name="uid", type="string", nullable=false, length=128)
     * @ORM\GeneratedValue(strategy="NONE")
     */
    protected $id;

    /**
     * @ORM\Column(name="privacy_id", type="string", nullable=false, length=128)
     */
    protected $privacyId;

    /**
     * @return mixed
     */
    public function getUpdated() {
        return $this->updated;
    }

    /**
     * @param mixed $updated
     *
     * @return PrivacyDeferred
     */
    public function setUpdated($updated) {
        $this->updated = $updated;
        return $this;
    }


    /**
     * @ORM\Column(name="created", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    protected $created;

    /**
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     */
    protected $updated;

    /**
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    protected $status;

    /**
     * @return mixed
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * @param mixed $status
     *
     * @return PrivacyDeferred
     */
    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }


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
     * @ORM\Column(name="form", type="json", nullable=true)
     */
    protected $form;

    /**
     * @ORM\Column(name="crypted_form", type="text", nullable=true, length=4294967295)
     * @Encrypted
     */
    protected $cryptedForm;

    /**
     * @ORM\Column(name="privacy", type="json_array", nullable=true, length=4294967295)
     */
    protected $privacy;

    /**
     * @ORM\Column(name="privacy_flags", type="json", nullable=true)
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
     * @return PrivacyDeferred
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
     * @ORM\Column(type="string", nullable=true)
     */
    protected $page;

    /**
     * @ORM\Column(name="site", type="string", nullable=false, length=255)
     */
    protected $site;

    /**
     * @return mixed
     */
    public function getPage() {
        return $this->page;
    }

    /**
     * @param mixed $page
     *
     * @return PrivacyDeferred
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
     * @return PrivacyDeferred
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
     * @return PrivacyDeferred
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
     * @return PrivacyDeferred
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
     * @return PrivacyDeferred
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
     * @return PrivacyDeferred
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
     * @return PrivacyDeferred
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
     * @return PrivacyDeferred
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
     * @return PrivacyDeferred
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
     * @return PrivacyDeferred
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
     * @return PrivacyDeferred
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
     * @return PrivacyDeferred
     */
    public function setCryptedForm($cryptedForm) {
        $this->cryptedForm = $cryptedForm;
        return $this;
    }

    /**
     * @param string $telephone
     * @return PrivacyDeferred
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
     * @return PrivacyDeferred
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
        return $this;
    }

    /**
     * @ORM\Column(name="ref", type="string", nullable=true, length=100)
     */
    protected $ref;

    /**
     * @return mixed
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * @param mixed $ref
     * @return PrivacyDeferred
     */
    public function setRef($ref)
    {
        $this->ref = $ref;
        return $this;
    }
}
