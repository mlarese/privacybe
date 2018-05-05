<?php

namespace App\Entity\Config;
use Doctrine\ORM\Mapping as ORM;
use function md5;

/**
 * user
 * @ORM\Table(
 *     name="user",
 *     uniqueConstraints={
 *          @ORM\UniqueConstraint(name="user_uq_user", columns={"user"})
 *     },
 *     indexes={
 *          @ORM\Index(name="user_type", columns={"type"}),
 *          @ORM\Index(name="user_active", columns={"active"})
 *     }
 * )
 * @ORM\Entity
 */
class User {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
     protected $id;


    /**
     * @ORM\Column(name="user", type="string", nullable=false, length=100)
     */
    protected $user;

    /**
     * admin, operator, owner
     * @ORM\Column(name="type", type="string", nullable=false, length=30)
     */
    protected $type;

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     * @return User
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = md5( $password);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return User
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }


    /**
     * @var $password  string
     * @ORM\Column(name="password", type="string", nullable=false)
     */
    protected $password;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return User
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @ORM\Column(name="active", type="boolean", nullable=false, options={"default" = 1})
     */
    protected $active=true;


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }


    /**
     * @ORM\Column(name="name", type="string", nullable=false, length=50)
     */
    protected $name;

    /**
     * @return mixed
     */
    public function getOwnerId() {
        return $this->ownerId;
    }

    /**
     * @param mixed $ownerId
     *
     * @return User
     */
    public function setOwnerId($ownerId) {
        $this->ownerId = $ownerId;
        return $this;
    }

    /**
     * @ORM\Column(name="owner_id", type="integer", nullable=true)
     */
    protected $ownerId;

    /**
     * @ORM\Column(name="deleted", type="boolean", nullable=false, options={"default" = 0} )
     */
    protected $deleted;

    /**
     * @return mixed
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param mixed $deleted
     * @return User
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
        return $this;
    }


}
