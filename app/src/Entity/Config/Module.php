<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 9/21/18
 * Time: 2:48 PM
 */

namespace App\Entity\Config;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="module")
 */
class Module
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="NONE")
     */
     protected $ownerId;

    /**
     * @ORM\Column((name="name", type="string", nullable=false, length=40)
     */
     protected $name;

    /**
     * @ORM\Column(type="boolean", nullable=false, length=80)
     */
     protected $deleted;

    /**
     * @return mixed
     */
    public function getOwnerId()
    {
        return $this->ownerId;
    }

    /**
     * @param mixed $ownerId
     */
    public function setOwnerId($ownerId)
    {
        $this->ownerId = $ownerId;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param mixed $deleted
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
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
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
     */
    public function setOption($option)
    {
        $this->option = $option;
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
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @ORM\Column(name="description", type="string", nullable=true, length=255)
     */
     protected $description;

    /**
     * @ORM\Column(name="option", type="json")
     */
     protected $option;

    /**
     * @ORM\Column(name="type", type="string", nullable=false, length=40)
     */
     protected $type;

}
