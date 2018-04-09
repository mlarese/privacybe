<?php
/**
 * Created by PhpStorm.
 * User: Courage
 * Date: 19/03/2018
 * Time: 13:23
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="privacy_log")
 */


class privacy_log
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="integer")
     */
    protected $privacy_id;
    /**
     * @ORM\Column(name="log_date", type="datetime", options={"default"="CURRENT_TIMESTAMP"})
     */
    protected $log_date;
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
     * @ORM\Column(name="string", length=100)
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