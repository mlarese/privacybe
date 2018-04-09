<?php
/**
 * Created by PhpStorm.
 * User: Courage
 * Date: 20/03/2018
 * Time: 13:08
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="term_flag")
 */

class TermFlag
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(name="term_id", type="integer")
     */
    protected $termId;
    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $name;
    /**
     * @ORM\Column(type="boolean")
     */
    protected $flag;
    /**
     * @ORM\Column(name="mandatory_flag", type="boolean")
     */
    protected $mandatoryFlag;
    /**
     * @ORM\Column(type="integer")
     */
    protected $order;

}