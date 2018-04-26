<?php
/**
 * Created by PhpStorm.
 * User: mauroadmin
 * Date: 15/04/18
 * Time: 22:31
 */

namespace App\Entity\Privacy;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="term_as_page")
 */
class TermHasPage
{
    /**
     * @ORM\Column(name="term_uid", type="string", nullable=false)
     * @ORM\Id
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
     * @return TermHasPage
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
     * @return TermHasPage
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
     * @return TermHasPage
     */
    public function setPage($page)
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @ORM\Column(name="domain", type="string", nullable=false)
     * @ORM\Id
     */
    protected $domain;

    /**
     * @ORM\Column(name="page", type="string", nullable=false)
     * @ORM\Id
     */
    protected $page;
}
