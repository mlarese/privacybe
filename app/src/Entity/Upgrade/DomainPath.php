<?php

namespace App\Entity\Upgrade;

use Doctrine\ORM\Mapping as ORM;

/**
 * DomainPath
 *
 * @ORM\Table(name="domain_path", indexes={@ORM\Index(name="name", columns={"name"})})
 * @ORM\Entity
 */
class DomainPath
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="text", length=65535, nullable=false)
     */
    private $path;

    /**
     * @var string
     *
     * @ORM\Column(name="redirurl", type="string", length=255, nullable=false)
     */
    private $redirurl;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getRedirurl(): string
    {
        return $this->redirurl;
    }

    /**
     * @param string $redirurl
     */
    public function setRedirurl(string $redirurl): void
    {
        $this->redirurl = $redirurl;
    }


}