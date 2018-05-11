<?php

namespace App\Entity\Upgrade;

use Doctrine\ORM\Mapping as ORM;

/**
 * DomainPath
 *
 * @ORM\Table(name="actions")
 * @ORM\Entity
 */
class Actions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="factoryclass", type="string", length=255, nullable=false)
     */
    private $factoryclass;


    /**
     * @var string
     *
     * @ORM\Column(name="command", type="string", length=255, nullable=true)
     */
    private $command;


    /**
     * @var string
     *
     * @ORM\Column(name="parameters", type="string", length=255, nullable=true)
     */
    private $parameters;

    /**
     * @ORM\ManyToOne(targetEntity="DomainPath", inversedBy="action")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     */
    private $domain;

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
    public function getFactoryclass(): string
    {
        return $this->factoryclass;
    }

    /**
     * @param string $factoryclass
     */
    public function setFactoryclass(string $factoryclass): void
    {
        $this->factoryclass = $factoryclass;
    }

    /**
     * @return string
     */
    public function getCommand(): string
    {
        return $this->command;
    }

    /**
     * @param string $command
     */
    public function setCommand(string $command): void
    {
        $this->command = $command;
    }

    /**
     * @return string
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param string $parameters
     */
    public function setParameters(string $parameters): void
    {
        $this->parameters = $parameters;
    }




}
