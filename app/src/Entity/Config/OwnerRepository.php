<?php

namespace App\Entity\Config;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *     name="owner_repository",
 *     indexes={
 *          @ORM\Index(name="owner_repository_owner_id", columns={"owner_id"})
 *     }
 * )
 */
class OwnerRepository
{
    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     * @return OwnerRepository
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
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
     * @return OwnerRepository
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     * @return OwnerRepository
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=50)
     * @ORM\GeneratedValue(strategy="NONE")
     */
     protected $code;

     /**
      * @ORM\Column(name="description", type="string", nullable=true)
      */
     protected $description;

     /**
      * @ORM\Column(name="data", type="json", nullable=true)
      */
     protected $data;

    /**
     * @return mixed
     */
    public function getOwnerId() {
        return $this->ownerId;
    }

    /**
     * @param mixed $ownerId
     *
     * @return OwnerRepository
     */
    public function setOwnerId($ownerId) {
        $this->ownerId = $ownerId;
        return $this;
    }

     /**
      * @ORM\Column(name="owner_id", type="integer", nullable=false)
      */
     protected $ownerId;
}
