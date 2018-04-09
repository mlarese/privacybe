<?php
/**
 * Created by PhpStorm.
 * User: Courage
 * Date: 18/03/2018
 * Time: 16:44
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="notification")
 */
class Notification
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
     * @return Notification
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return Notification
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReadFlag()
    {
        return $this->readFlag;
    }

    /**
     * @param mixed $readFlag
     * @return Notification
     */
    public function setReadFlag($readFlag)
    {
        $this->readFlag = $readFlag;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNotificationDate()
    {
        return $this->notificationDate;
    }

    /**
     * @param mixed $notificationDate
     * @return Notification
     */
    public function setNotificationDate($notificationDate)
    {
        $this->notificationDate = $notificationDate;
        return $this;
    }
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $email;
    /**
     * @ORM\Column(name="read_flag", type="boolean")
     */
    protected $readFlag=false;

    /**
     * @ORM\Column(name="notification_date", type="datetime", options={"default"="CURRENT_TIMESTAMP"})
     */
    protected $notificationDate='0000-00-00 00:00:00';
}