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

class Term
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Term
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
     * @return Term
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOwnerId()
    {
        return $this->ownerId;
    }

    /**
     * @param mixed $ownerId
     * @return Term
     */
    public function setOwnerId($ownerId)
    {
        $this->ownerId = $ownerId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVersionId()
    {
        return $this->versionId;
    }

    /**
     * @param mixed $versionId
     * @return Term
     */
    public function setVersionId($versionId)
    {
        $this->versionId = $versionId;
        return $this;
    }
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