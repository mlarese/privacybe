<?php
/**
 * Created by PhpStorm.
 * User: Courage
 * Date: 21/03/2018
 * Time: 15:16
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="term")
 */

class term
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     */
    protected $name;
    /**
     * @ORM\Column(name="owner_id", type="integer")
     */
    protected $ownerId;
    /**
     * @ORM\Column(name="version_id", type="integer")
     */
    protected $versionId;

}