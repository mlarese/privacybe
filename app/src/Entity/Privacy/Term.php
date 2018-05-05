<?php

namespace App\Entity\Privacy;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *     name="term",
 *     indexes={
 *          @ORM\Index(name="term_created", columns={"created"}),
 *          @ORM\Index(name="term_suspended", columns={"suspended"}),
 *          @ORM\Index(name="term_published", columns={"published"}),
 *          @ORM\Index(name="term_modified", columns={"modified"})
 *     }
 * )
 */
class Term
{
    /**
     * @return mixed
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param mixed $uid
     * @return Term
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
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
    public function getParagraphs()
    {
        return $this->paragraphs;
    }

    /**
     * @param mixed $paragraphs
     * @return Term
     */
    public function setParagraphs($paragraphs)
    {
        $this->paragraphs = $paragraphs;
        return $this;
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=128)
     * @ORM\GeneratedValue(strategy="NONE")
     */
     protected $uid;

     /**
      * @ORM\Column(name="name", type="string", nullable=false)
      */
     protected $name;

    /**
     * @ORM\Column(name="paragraphs", type="json", nullable=true)
     */
    protected $paragraphs;

    /**
     * @ORM\Column(name="status", type="string", nullable=false, length=1)
     */
    protected $status;

    /**
     * @ORM\Column(name="published", type="datetime", nullable=true)
     */
    protected $published;

    /**
     * @return mixed
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status) {
        $this->status = $status;
    }

    /**
     * @ORM\Column(name="created", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    protected $created;

    /**
     * @return mixed
     */
    public function getPublished()
    {
        return $this->published;
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
     * @return Term
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @param mixed $modified
     * @return Term
     */
    public function setModified($modified)
    {
        $this->modified = $modified;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSuspended()
    {
        return $this->suspended;
    }

    /**
     * @param mixed $suspended
     * @return Term
     */
    public function setSuspended($suspended)
    {
        $this->suspended = $suspended;
        return $this;
    }

    /**
     * @param mixed $published
     * @return Term
     */
    public function setPublished($published)
    {
        $this->published = $published;
        return $this;
    }

    /**
     * @ORM\Column(name="modified", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    protected $modified;

    /**
     * @ORM\Column(name="suspended", type="datetime", nullable=true)
     */
    protected $suspended;

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
     * @return Term
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
        return $this;
    }

}
