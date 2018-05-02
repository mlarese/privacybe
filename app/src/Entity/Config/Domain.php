<?php

namespace App\Entity\Config;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *     name="domain",
 *     indexes={
 *          @ORM\Index(name="domain_active", columns={"active"})
 *     }
 * )
 */
class Domain
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     * @ORM\GeneratedValue(strategy="NONE")
     */
     protected $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Domain
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return Domain
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     * @return Domain
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

     /**
      * @ORM\Column(name="description", type="string", nullable=true, length=255)
      */
     protected $description;

     /**
      * @ORM\Column(name="active", type="boolean", nullable=false)
      */
     protected $active=true;


    /**
     * @return Owner
     */
    public function getOwner() {
        return $this->owner;
    }

    /**
     * @param Owner $owner
     *
     * @return Domain
     */
    public function setOwner($owner) {
        $this->owner = $owner;
        return $this;

    }

    /**
     * @var Owner
     * @ORM\ManyToOne(targetEntity="Owner", fetch="EXTRA_LAZY")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="owner_id", referencedColumnName="id")
     * })
     */
    protected $owner;
}
