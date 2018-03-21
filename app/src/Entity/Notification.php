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