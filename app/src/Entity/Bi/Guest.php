<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 9/24/18
 * Time: 4:15 PM
 */

namespace App\Entity\Bi;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="guest")
 */
class Guest
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="NONE")
     */
     protected $id;

    /**
     * @ORM\Column((name="nationality", type="string", nullable=true, length=60)
     */
     protected $nationality;

    /**
     * @ORM\Column((name="city", type="string", nullable=false, length=40)
     */
    protected $city;

    /**
     * @ORM\Column((name="name", type="string", nullable=true, length=50)
     */
    protected $name;

    /**
     * @ORM\Column((name="surname", type="string", nullable=true, length=50)
     */
    protected $surname;

    /**
     * @ORM\Column((name="region", type="string", nullable=false, length=40)
     */
    protected $region;

    /**
     * @ORM\Column((name="language", type="string", nullable=false, length=40)
     */
    protected $language;

    /**
     * @ORM\Column((name="age", type="string", nullable=false, length=10)
     */
    protected $age;

    /**
     * @ORM\Column((name="email", type="string", nullable=false, length=100)
     */
    protected $email;

    /**
     * @ORM\Column((name="return", type="datetime", nullable=false, length=10)
     */
    protected $return;

    /**
     * @ORM\Column((name="consents", type="json", nullable=false, length=10)
     */
    protected $consents;




}
