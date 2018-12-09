<?php

namespace GDPR\Entity\Privacy;
use GDPR\DoctrineEncrypt\Configuration\Encrypted;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Table( name="privacy_attachment",
 *     indexes={
 *          @ORM\Index(name="privacy_created", columns={"created"})
 *     }
 * )
 * @ORM\Entity
 */
class PrivacyAttachment {
    /**
     * @ORM\Id
     * @ORM\Column(name="uid", type="string", nullable=false, length=128)
     * @ORM\GeneratedValue(strategy="NONE")
     */
    protected $id;

    /**
     * @return mixed
     */
    public function getDeleted() {
        return $this->deleted;
    }

    /**
     * @param mixed $deleted
     *
     * @return PrivacyAttachment
     */
    public function setDeleted($deleted) {
        $this->deleted = $deleted;
        return $this;
    }
    /**
     * @ORM\Column(name="deleted", type="boolean", nullable=false, options={"default" = 0} )
     */
    protected $deleted;
    /**
     * @ORM\Column(name="created", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    protected $created;

    /**
     * @ORM\Column(type="text", nullable=true, length=4294967295)
     * @Encrypted()
     */
    protected $attachments;

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return PrivacyAttachment
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreated() {
        return $this->created;
    }

    /**
     * @param mixed $created
     *
     * @return PrivacyAttachment
     */
    public function setCreated($created) {
        $this->created = $created;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAttachments() {
        return $this->attachments;
    }

    /**
     * @param mixed $attachments
     *
     * @return PrivacyAttachment
     */
    public function setAttachments($attachments) {
        $this->attachments = $attachments;
        return $this;
    }

}
