<?php
/**
 * Created by PhpStorm.
 * User: Courage
 * Date: 12/06/2018
 * Time: 13:55
 */

namespace App\Entity\Config;
use Doctrine\ORM\Mapping as ORM;

class Operator
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="operator_id", type="integer")
     */
    protected $operatorId;
    /**
     * @ORM\Column(name="operator_name", type="string")
     */
    protected $operatorName;
    /**
     * @ORM\Column(name="wind_mt_carrier", type="string", length=100)
     */
    protected $windMtCarrier;
}
