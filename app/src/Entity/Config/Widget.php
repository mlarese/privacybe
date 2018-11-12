<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 9/21/18
 * Time: 3:50 PM
 */

namespace App\Entity\Config;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="widget")
 */
class Widget
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="NONE")
     */
    protected $Id;

    /**
     * @ORM\Column((name="name", type="string", nullable=false, length=40)
     */
    protected $name;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @param mixed $Id
     */
    public function setId($Id)
    {
        $this->Id = $Id;
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
    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * @param mixed $configuration
     */
    public function setConfiguration($configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * @ORM\Column(type="boolean", nullable=false, length=80)
     */
    protected $deleted;

    /**
     * @ORM\Column(name="description", type="string", nullable=true, length=255)
     */
    protected $description;

    /**
     * @ORM\Column(type="json")
     */
    protected $configuration;

}
