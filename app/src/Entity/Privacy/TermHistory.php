<?php

namespace App\Entity\Privacy;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *     name="term_history",
 *     indexes={
 *          @ORM\Index(name="term_history_created", columns={"created"}),
 *          @ORM\Index(name="term_history_modifier", columns={"modifier"}),
 *          @ORM\Index(name="term_history_term_uid", columns={"term_uid"}),
 *     }
 * )
 */
class TermHistory
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
     * @ORM\Column(name="term", type="json", nullable=true)
     */
    protected $term;

    /**
     * @ORM\Column(name="term_uid", type="string", nullable=false, length=128)
     */
    protected $termUid;

    /**
     * @ORM\Column(name="modifier", type="integer", nullable=false)
     */
    protected $modifier;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return TermHistory
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return TermHistory
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTerm()
    {
        return $this->term;
    }

    /**
     * @param mixed $term
     * @return TermHistory
     */
    public function setTerm($term)
    {
        $this->term = $term;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTermUid()
    {
        return $this->termUid;
    }

    /**
     * @param mixed $termUid
     * @return TermHistory
     */
    public function setTermUid($termUid)
    {
        $this->termUid = $termUid;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getModifier()
    {
        return $this->modifier;
    }

    /**
     * @param mixed $modifier
     * @return TermHistory
     */
    public function setModifier($modifier)
    {
        $this->modifier = $modifier;
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
     * @return TermHistory
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
     * @return TermHistory
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
