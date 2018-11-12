<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 9/24/18
 * Time: 4:17 PM
 */

namespace App\Entity\Bi;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="sell")
 */
class Sell
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="NONE")
     */
     protected $id;

    /**
     * @ORM\Column(name="product", type="string", nullable=true, length=100)
     */
    protected $product;

    /**
     * @ORM\Column(name="nation", type="string", nullable=true, length=100)
     */
    protected $nation;

    /**
     * @ORM\Column(name="year", type="string", nullable=true, length=100)
     */
    protected $year;

    /**
     * @ORM\Column(name="month", type="string", nullable=true, length=100)
     */
    protected $month;

    /**
     * @ORM\Column(name="origin", type="string", nullable=true, length=100)
     */
    protected $origin;

}
