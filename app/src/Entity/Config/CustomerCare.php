<?php

namespace App\Entity\Config;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *     name="customer_care",
 *     indexes={
 *          @ORM\Index(name="customer_care_name", columns={"name"})
 *     }
 * )
 */
class CustomerCare
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
     *
     * @return CustomerCare
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
     *
     * @return CustomerCare
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @return mixed
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param mixed $profile
     *
     * @return CustomerCare
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;
        return $this;
    }

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;

    /**
     * @var $profile
     *
     * @ORM\Column(name="profile", type="json", nullable=true)
     */
    protected $profile;

    /**
     * @return mixed
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return CustomerCare
     */
    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstName() {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     *
     * @return CustomerCare
     */
    public function setFirstName($firstName) {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName() {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     *
     * @return CustomerCare
     */
    public function setLastName($lastName) {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @ORM\Column(name="email", type="string", nullable=true, length=100)
     */
    protected $email;

    /**
     * @ORM\Column(name="first_name", type="string", nullable=true, length=100)
     */
    protected $firstName;

    /**
     * @ORM\Column(name="last_name", type="string", nullable=true, length=100)
     */
    protected $lastName;
}
