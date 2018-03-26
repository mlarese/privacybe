<?php
/**
 * Created by PhpStorm.
 * User: Courage
 * Date: 20/03/2018
 * Time: 15:40
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="privacy")
 */

class Privacy
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\domainServiceId
     * @ORM\Column(name="domain_service_id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $domainServiceId;
    /**
     * @ORM\Column(name="term_id", type="integer")
     */
    protected $termId;
    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $email;
    /**
     * @ORM\Column(type="text")
     */
    protected $term;



}