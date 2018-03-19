<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(
 *     name="operator"
 * )
 */
class Operator {
    /**
     * @ORM\Id
     * @ORM\Column(name="operator_id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    protected $name;

    /**
     * @ORM\Column(name="creation_date", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    protected $creationDate = '0000-00-00 00:00:00';

    /**
     * @ORM\OneToOne(targetEntity="OperatorData", mappedBy="Operator")
     * @ORM\JoinColumn(name="operator_data_id", referencedColumnName="id")
     */

    protected $operatorData;
}