<?php

namespace GDPR\Entity\Upgrade;

use Doctrine\ORM\Mapping as ORM;

/**
 * DomainDisclaimer
 *
 * @ORM\Table(name="domain_disclaimer", indexes={@ORM\Index(name="domainpath", columns={"domainpath"}), @ORM\Index(name="IDX_B981D9192803C55C", columns={"disclaimer"})})
 * @ORM\Entity
 */
class DomainDisclaimer
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="todate", type="datetime", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $todate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fromdate", type="datetime", nullable=false)
     */
    private $fromdate;

    /**
     * @var \Privacydisclaimer
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Privacydisclaimer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="disclaimer", referencedColumnName="id")
     * })
     */
    private $disclaimer;

    /**
     * @var \DomainPath
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="DomainPath")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="domainpath", referencedColumnName="id")
     * })
     */
    private $domainpath;


    /**
     * @return DateTime
     */
    public function getTodate(): DateTime
    {
        return $this->todate;
    }

    /**
     * @param DateTime $todate
     */
    public function setTodate(DateTime $todate): void
    {
        $this->todate = $todate;
    }

    /**
     * @return DateTime
     */
    public function getFromdate(): DateTime
    {
        return $this->fromdate;
    }

    /**
     * @param DateTime $fromdate
     */
    public function setFromdate(DateTime $fromdate): void
    {
        $this->fromdate = $fromdate;
    }

    /**
     * @return Privacydisclaimer
     */
    public function getDisclaimer(): Privacydisclaimer
    {
        return $this->disclaimer;
    }

    /**
     * @param Privacydisclaimer $disclaimer
     */
    public function setDisclaimer(Privacydisclaimer $disclaimer): void
    {
        $this->disclaimer = $disclaimer;
    }

    /**
     * @return DomainPath
     */
    public function getDomainpath(): DomainPath
    {
        return $this->domainpath;
    }

    /**
     * @param DomainPath $domainpath
     */
    public function setDomainpath(DomainPath $domainpath): void
    {
        $this->domainpath = $domainpath;
    }


}
