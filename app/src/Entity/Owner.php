<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(
 *     name="owner",
 *     uniqueConstraints={@ORM\UniqueConstraint(name="owner_code_unique", columns={"code"})}
 * )
 */
class Owner {
    /**
     * @ORM\Id
     * @ORM\Column(name="owner_id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=20, nullable=false)
     */
    protected $code;

    /**
     * @ORM\Column(name="creation_date", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    protected $creationDate = '0000-00-00 00:00:00';

    /**
     * @ORM\OneToOne(targetEntity="OwnerData", mappedBy="owner")
     */
    protected $ownerData;
}