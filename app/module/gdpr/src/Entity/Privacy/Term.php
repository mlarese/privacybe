<?php

namespace GDPR\Entity\Privacy;

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
     * @ORM\Column(name="status", type="string", nullable=false, length=30)
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
     * @return Term
     */
    public function setStatus($status) {
        $this->status = $status;
        return $this;
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
     * @ORM\Column( type="integer", nullable=true,  options={"default" = 0} )
     */
    protected $version;

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param mixed $version
     * @return Term
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeleted()
    {
        return $this->deleted;
    }


    /**
     * @ORM\Column(name="options", type="json", nullable=true)
     */
    protected $options;

    /**
     * @return mixed
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param mixed $options
     * @return Term
     */
    public function setOptions($options)
    {
        $this->options = $options;
        return $this;
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

    protected $pages;

    /**
     * @return mixed
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * @param mixed $pages
     * @return Term
     */
    public function setPages($pages)
    {
        $this->pages = $pages;
        return $this;
    }

    protected $deletable=true;

    /**
     * @return bool
     */
    public function isDeletable(): bool
    {
        return $this->deletable;
    }

    /**
     * @param bool $deletable
     * @return Term
     */
    public function setDeletable(bool $deletable): Term
    {
        $this->deletable = $deletable;
        return $this;
    }


}
