<?php
/**
 * Created by PhpStorm.
 * User: mauro.larese
 * Date: 17/03/2018
 * Time: 12:28
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *     name="owner_data"
 * )
 */
class OwnerData {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="Owner", inversedBy="owner_data")
     * @ORM\JoinColumn(name="id", referencedColumnName="id", nullable=false)
     */
    protected $owner;
}