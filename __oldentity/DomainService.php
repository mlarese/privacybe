<?php
/**
 * Created by PhpStorm.
 * User: Courage
 * Date: 19/03/2018
 * Time: 23:21
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="domain_service")
 */

class DomainService
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
     * @return DomainService
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
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
     * @return DomainService
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDomainPathId()
    {
        return $this->domainPathId;
    }

    /**
     * @param mixed $domainPathId
     * @return DomainService
     */
    public function setDomainPathId($domainPathId)
    {
        $this->domainPathId = $domainPathId;
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
    protected $name;
    /**
     * @ORM\Column(name="domain_path_id", type="integer")
     */
    protected $domainPathId;

}