<?php

namespace App\Entity\Privacy;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="treatment")
 */
class Treatment
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
     * @return Treatment
     */
    public function setCode($code)
    {
        $this->code = $code;
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
     * @return Treatment
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=30)
     * @ORM\GeneratedValue(strategy="NONE")
     */
     protected $code;

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     * @return Treatment
     */
    public function setNote($note)
    {
        $this->note = $note;
        return $this;
    }

     /**
      * @ORM\Column(name="name", type="string", nullable=false)
      */
     protected $name;

     /**
      * @ORM\Column(name="note", type="text", nullable=true)
      */
     protected $note;

     /**
      * @ORM\Column(name="created", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
      */
     protected $created;

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     * @return Treatment
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * @param mixed $creator
     * @return Treatment
     */
    public function setCreator($creator)
    {
        $this->creator = $creator;
        return $this;
    }

     /**
      * @ORM\Column(name="creator", type="json", nullable=true)
      */
     protected $creator;

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
     * @return mixed
     */
    public function getOptions() {
        return $this->options;
    }

    /**
     * @param mixed $options
     *
     * @return Treatment
     */
    public function setOptions($options) {
        $this->options = $options;
        return $this;
    }



    /**
     * @return mixed
     */
    public function getHistory() {
        return $this->history;
    }

    /**
     * @param mixed $history
     *
     * @return Treatment
     */
    public function setHistory($history) {
        $this->history = $history;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGroupCode() {
        return $this->groupCode;
    }

    /**
     * @param mixed $groupCode
     *
     * @return Treatment
     */
    public function setGroupCode($groupCode) {
        $this->groupCode = $groupCode;
        return $this;
    }


    /**
     * @ORM\Column(name="options", type="json", nullable=true)
     */
     protected $options;

    /**
     * @ORM\Column(name="group_code", type="string", nullable=true, length=60)
     */
    protected $groupCode;

    /**
     * @ORM\Column(name="history", type="json", nullable=true)
     */
    protected $history;

     /**
      * @param mixed $deleted
      * @return Treatment
      */
     public function setDeleted($deleted)
     {
         $this->deleted = $deleted;
         return $this;
     }

}
