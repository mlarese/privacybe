<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 9/24/18
 * Time: 4:17 PM
 */

namespace GDPR\Entity\Bi;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="booking")
 */
class Booking
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="NONE")
     */
     protected $id;

    /**
     * @ORM\Column(name="year", type="decimal", nullable=true, length=100)
     */
    protected $year;

    /**
     * @ORM\Column(name="month", type="decimal", nullable=false, length=100)
     */
    protected $month;

    /**
     * @ORM\Column(name="quantity", type="decimal", nullable=false, length=100)
     */
    protected $quantity;

    /**
     * @ORM\Column(name="channel", type="json", nullable=false, length=100)
     */
    protected $channel;

    /**
     * @ORM\Column(name="night", type="integer", nullable=false, length=100)
     */
    protected $night;

    /**
     * @ORM\Column(name="amount", type="decimal", nullable=false, length=100)
     */
    protected $amount;

    /**
     * @ORM\Column(name="amount_sum", type="json", nullable=false, length=100)
     */
    protected $amountSum;

    /**
     * @ORM\Column(name="origin", type="json", nullable=false, length=100)
     */
    protected $origin;

    /**
     * @ORM\Column(name="opening_date", type="datetime", nullable=false, length=100)
     */
    protected $openingDate;

    /**
     * @ORM\Column(name="check_in_date", type="datetime", nullable=false, length=100)
     */
    protected $checkInDate;

    /**
     * @ORM\Column(name="check_out_date", type="datetime", nullable=false, length=100)
     */
    protected $checkOutDate;

    /**
     * @ORM\Column(name="pax", type="string", nullable=false, length=100)
     */
    protected $pax;

    /**
     * @ORM\Column(name="children", type="string", nullable=false, length=100)
     */
    protected $children;

    /**
     * @ORM\Column(name="personal_data", type="json", nullable=false, length=100)
     */
    protected $personalData;

    /**
     * @ORM\Column(name="lead_time", type="datatime", nullable=false, length=100)
     */
    protected $leadTime;







}
