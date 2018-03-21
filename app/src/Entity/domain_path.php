<?php
/**
 * Created by PhpStorm.
 * User: Courage
 * Date: 19/03/2018
 * Time: 23:31
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="domain_path")
 */

class domain_path
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Id
     * @ORM\Column(name="domain_id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $domainId;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $path;

}