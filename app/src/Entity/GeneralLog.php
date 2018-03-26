<?php
/**
 * Created by PhpStorm.
 * User: Courage
 * Date: 20/03/2018
 * Time: 13:46
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="general_log")
 */

class GeneralLog
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(name="notification_date", type="datetime", options={"default"="CURRENT_TIMESTAMP"})
     */
    protected $logDate;
    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $type;
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $description;
    /**
     * @ORM\Column(type="text")
     */
    protected $option;

}