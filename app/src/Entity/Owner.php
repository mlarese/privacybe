<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity()
 * @ORM\Table(
 *     name="owner",
 *     uniqueConstraints={@ORM\UniqueConstraint(name="owner_code_unique", columns={"code"})}
 * )
 */
class Owner {
    /**
     * @ORM\Id()
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    protected $name;

    /**
     * Owner constructor.
     */
    public function __construct() {
        $this->setCreationDate(new DateTime());
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return Owner
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param mixed $name
     *
     * @return Owner
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCode() {
        return $this->code;
    }

    /**
     * @param mixed $code
     *
     * @return Owner
     */
    public function setCode($code) {
        $this->code = $code;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreationDate() {
        return $this->creationDate;
    }

    /**
     * @param mixed $creationDate
     *
     * @return Owner
     */
    public function setCreationDate($creationDate) {
        $this->creationDate = $creationDate;
        return $this;
    }

    /**
     * @return OwnerData
     */
    public function getOwnerData() {
        return $this->ownerData;
    }

    /**
     * @param mixed $ownerData
     *
     * @return Owner
     */
    public function setOwnerData($ownerData) {
        $ownerData->setId( $this->id);
        $this->ownerData = $ownerData;
        return $this;
    }

    /**
     * @ORM\Column(type="string", length=20, nullable=false)
     */
    protected $code;

    /**
     * @ORM\Column(name="creation_date", type="datetime", options={"default"="CURRENT_TIMESTAMP"})
     */
    protected $creationDate;

    /**
     * @ORM\OneToOne(targetEntity="OwnerData", mappedBy="owner", cascade={"all"}, fetch="LAZY")
     */
    protected $ownerData;


}