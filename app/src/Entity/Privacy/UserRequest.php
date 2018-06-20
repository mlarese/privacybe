<?php
/**
 * Created by PhpStorm.
 * User: mauro.larese
 * Date: 07/06/2018
 * Time: 11:36
 */

namespace App\Entity\Privacy;

use Doctrine\ORM\Mapping as ORM;
/**
 *
 * @ORM\Table(
 *     name="user_request",
 *     indexes={
 *          @ORM\Index(name="user_request_mail", columns={"mail"}),
 *          @ORM\Index(name="user_request_type", columns={"type"}),
 *          @ORM\Index(name="user_request_domain_site", columns={"domain","site"}),
 *          @ORM\Index(name="user_request_last_access", columns={"domain","last_access"}),
 *          @ORM\Index(name="user_request_status", columns={"domain","status"}),
 *          @ORM\Index(name="user_request_created", columns={"created"})
 *     }
 *)
 * @ORM\Entity
 */
class UserRequest {
    /**
     * @ORM\Id()
     * @ORM\Column(name="uid", type="string", length=128)
     * @ORM\GeneratedValue(strategy="NONE")
     */
    protected $uid;

    /**
     * @ORM\Column(name="mail", type="string", nullable=false, length=100)
     */
    protected $mail;


    /**
     * @ORM\Column(name="note", type="text", nullable=false)
     */
    protected $note;

    /**
     * @return mixed
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * @param mixed $status
     *
     * @return UserRequest
     */
    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    /**
     * @ORM\Column(name="status", type="string", nullable=false, length=50)
     */
    protected $status;

    /**
     * @ORM\Column(name="history", type="json", nullable=true)
     */
    protected $history;

    /**
     * @ORM\Column(name="flow", type="json", nullable=true)
     */
    protected $flow;
    /**
     * @ORM\Column(name="type", type="string", nullable=false, length=50)
     */
    protected $type;

    /**
     * @ORM\Column(name="created", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    protected $created;

    /**
     * @ORM\Column(name="last_access", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    protected $lastAccess;

    /**
     * @return mixed
     */
    public function getUid() {
        return $this->uid;
    }

    /**
     * @param mixed $uid
     *
     * @return UserRequest
     */
    public function setUid($uid) {
        $this->uid = $uid;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHistory()
    {
        return $this->history;
    }

    /**
     * @param mixed $history
     * @return UserRequest
     */
    public function setHistory($history)
    {
        $this->history = $history;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFlow()
    {
        return $this->flow;
    }

    /**
     * @param mixed $flow
     * @return UserRequest
     */
    public function setFlow($flow)
    {
        $this->flow = $flow;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastAccess()
    {
        return $this->lastAccess;
    }

    /**
     * @param mixed $lastAccess
     * @return UserRequest
     */
    public function setLastAccess($lastAccess)
    {
        $this->lastAccess = $lastAccess;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMail() {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     *
     * @return UserRequest
     */
    public function setMail($mail) {
        $this->mail = $mail;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNote() {
        return $this->note;
    }

    /**
     * @param mixed $note
     *
     * @return UserRequest
     */
    public function setNote($note) {
        $this->note = $note;
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
     * @return UserRequest
     */
    public function setType($type) {
        $this->type = $type;
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
     * @return UserRequest
     */
    public function setCreated($created) {
        $this->created = $created;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDomain() {
        return $this->domain;
    }

    /**
     * @param mixed $domain
     *
     * @return UserRequest
     */
    public function setDomain($domain) {
        $this->domain = $domain;
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
     * @return UserRequest
     */
    public function setSite($site) {
        $this->site = $site;
        return $this;
    }

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $domain;

    /**
     * @ORM\Column(name="site", type="string", nullable=true)
     */
    protected $site;


}
