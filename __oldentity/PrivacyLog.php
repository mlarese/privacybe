<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="privacy_log")
 */


class PrivacyLog
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return PrivacyLog
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrivacyId()
    {
        return $this->privacyId;
    }

    /**
     * @param mixed $privacyId
     * @return PrivacyLog
     */
    public function setPrivacyId($privacyId)
    {
        $this->privacyId = $privacyId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLogDate()
    {
        return $this->logDate;
    }

    /**
     * @param mixed $logDate
     * @return PrivacyLog
     */
    public function setLogDate($logDate)
    {
        $this->logDate = $logDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return PrivacyLog
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return PrivacyLog
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOption()
    {
        return $this->option;
    }

    /**
     * @param mixed $option
     * @return PrivacyLog
     */
    public function setOption($option)
    {
        $this->option = $option;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param mixed $domain
     * @return PrivacyLog
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     * @return PrivacyLog
     */
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param mixed $service
     * @return PrivacyLog
     */
    public function setService($service)
    {
        $this->service = $service;
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
     * @return PrivacyLog
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    /**
     * @ORM\Column(name="privacy_id", type="integer")
     */
    protected $privacyId;
    /**
     * @ORM\Column(name="log_date", type="datetime", options={"default"="CURRENT_TIMESTAMP"})
     */
    protected $logDate;
    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $type;
    /**
     * @ORM\Column(type="string", length=225)
     */
    protected $description;
    /**
     * @ORM\Column(type="text")
     */
    protected $option;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $domain;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $path;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $service;
    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $email;

}