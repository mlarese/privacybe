<?php

namespace App\Entity\Privacy;

use App\DoctrineEncrypt\Configuration\Encrypted;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *     name="privacy",
 *     indexes={
 *          @ORM\Index(name="privacy_history_created", columns={"created"}),
 *          @ORM\Index(name="privacy_history_privacy_id", columns={"privacy_id"}),
 *     }
 * )
 */
class PrivacyHistory
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
     protected $id;

    /**
     * @ORM\Column(name="created", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    protected $created;

    /**
     * @ORM\Column(name="privacy", type="text", nullable=true, length=4294967295)
     * @Encrypted
     */
    protected $privacy;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return PrivacyHistory
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @ORM\Column(name="privacy_id", type="integer", nullable=false)
     */
    protected $privacyId;

    /**
     * @return mixed
     */
    public function getPrivacyId()
    {
        return $this->privacyId;
    }

    /**
     * @param mixed $privacyId
     * @return PrivacyHistory
     */
    public function setPrivacyId($privacyId)
    {
        $this->privacyId = $privacyId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     * @return PrivacyHistory
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrivacy()
    {
        return $this->privacy;
    }

    /**
     * @param mixed $privacy
     * @return PrivacyHistory
     */
    public function setPrivacy($privacy)
    {
        $this->privacy = $privacy;
        return $this;
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
     * @return PrivacyHistory
     */
    public function setType($type)
    {
        $this->type = $type;
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
     * @return PrivacyHistory
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }


    /**
     * @ORM\Column(name="type", type="string", nullable=false)
     */
    protected $type;

    /**
     * @ORM\Column(name="description", type="string", nullable=false)
     */
    protected $description;
}
