<?php
/**
 * Created by PhpStorm.
 * User: Courage
 * Date: 20/03/2018
 * Time: 15:40
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="privacy")
 */

class Privacy
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Privacy
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDomainServiceId()
    {
        return $this->domainServiceId;
    }

    /**
     * @param mixed $domainServiceId
     * @return Privacy
     */
    public function setDomainServiceId($domainServiceId)
    {
        $this->domainServiceId = $domainServiceId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTermId()
    {
        return $this->termId;
    }

    /**
     * @param mixed $termId
     * @return Privacy
     */
    public function setTermId($termId)
    {
        $this->termId = $termId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return Privacy
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
     * @return Privacy
     */
    public function setTerm($term)
    {
        $this->term = $term;
        return $this;
    }
    /**
     * @ORM\Column(name="domain_service_id", type="integer")
     */
    protected $domainServiceId;
    /**
     * @ORM\Column(name="term_id", type="integer")
     */
    protected $termId;
    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $email;
    /**
     * @ORM\Column(type="text")
     */
    protected $term;



}