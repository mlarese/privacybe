<?php

namespace App\Entity\Config;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user_login")
 */
class UserLogin
{
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return UserLogin
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLoginDate()
    {
        return $this->loginDate;
    }

    /**
     * @param mixed $loginDate
     * @return UserLogin
     */
    public function setLoginDate($loginDate)
    {
        $this->loginDate = $loginDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @param mixed $ipAddress
     * @return UserLogin
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
     protected $id;

     /**
      * @ORM\Column(name="loginDate", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
      */
     protected $loginDate;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     * @return UserLogin
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

     /**
      * @ORM\Column(name="ip_address", type="string", nullable=false, length=50)
      */
     protected $ipAddress;

    /**
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    protected $userId;
     
}
