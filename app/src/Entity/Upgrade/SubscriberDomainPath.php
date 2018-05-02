<?php
namespace App\Entity\Upgrade;

use Doctrine\ORM\Mapping as ORM;

/**
 * SubscriberDomainPath
 *
 * @ORM\Table(name="subscriber_domain_path", indexes={@ORM\Index(name="privacydisclaimer", columns={"privacydisclaimer"}), @ORM\Index(name="email", columns={"email"}), @ORM\Index(name="domainpath", columns={"domainpath"})})
 * @ORM\Entity
 */
class SubscriberDomainPath
{
    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=2, nullable=false)
     */
    private $language;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=255, nullable=false)
     */
    private $ip;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="upgradedate", type="datetime", nullable=true)
     *
     */
    private $upgradedate;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    private $status = '0';

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
     * @var \Privacydisclaimer
     *
     * @ORM\ManyToOne(targetEntity="Privacydisclaimer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="privacydisclaimer", referencedColumnName="id")
     * })
     */
    private $privacydisclaimer;


    public function getId(){
        if($this->domainpath){
            return $this->email . '#' . $this->domainpath->getId();
        }
        else{
            return '';
        }
    }
    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage(string $language): void
    {
        $this->language = $language;
    }

    /**
     * @return string
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     */
    public function setIp(string $ip): void
    {
        $this->ip = $ip;
    }

    /**
     * @return DateTime
     */
    public function getUpgradedate()
    {

        return $this->upgradedate;
    }

    /**
     * @param DateTime $upgradedate
     */
    public function setUpgradedate( $upgradedate): void
    {
        $this->upgradedate = $upgradedate;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
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

    /**
     * @return Privacydisclaimer
     */
    public function getPrivacydisclaimer(): Privacydisclaimer
    {
        return $this->privacydisclaimer;
    }

    /**
     * @param Privacydisclaimer $privacydisclaimer
     */
    public function setPrivacydisclaimer(Privacydisclaimer $privacydisclaimer): void
    {
        $this->privacydisclaimer = $privacydisclaimer;
    }



}
