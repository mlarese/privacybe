<?php

namespace GDPR\Entity\Privacy;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="term_page")
 */
class TermPage
{
    /**
     * @ORM\Id
     * @ORM\Column(name="term_uid", type="string", nullable=false)
     */
    protected $termUid;

    /**
     * @return mixed
     */
    public function getTermUid()
    {
        return $this->termUid;
    }

    /**
     * @param mixed $termUid
     *
     * @return TermPage
     */
    public function setTermUid($termUid)
    {
        $this->termUid = $termUid;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param mixed $domain
     *
     * @return TermPage
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param mixed $page
     *
     * @return TermPage
     */
    public function setPage($page)
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @ORM\Id
     * @ORM\Column(name="domain", type="string", nullable=false)
     */
    protected $domain;

    /**
     * @ORM\Id
     * @ORM\Column(name="page", type="string", nullable=false)
     */
    protected $page;

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
     * @return TermPage
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
        return $this;
    }
}
