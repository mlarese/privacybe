<?php

namespace GDPR\Entity\Config;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="group")
 */
class Group
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
     *
     * @return Group
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
     *
     * @return Group
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAcl()
    {
        return $this->acl;
    }

    /**
     * @param mixed $acl
     *
     * @return Group
     */
    public function setAcl($acl)
    {
        $this->acl = $acl;
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
      * @ORM\Column(name="acl", type="json", nullable=true)
      */
     protected $acl;

    /**
     * @ORM\Column(name="options", type="json", nullable=true)
     */
    protected $options;

    /**
     * @ORM\Column(name="profile", type="json", nullable=true)
     */
    protected $profile;
}
