<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity()
 * @ORM\Table(
 *     name="owner"
 * )
 */
class Owner {
    /**
     * @ORM\Id()
     * @ORM\Column(name="id", type="string")
     * @ORM\GeneratedValue(strategy="NONE")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $email;
    /**
    * @ORM\Column(type="string", length=255)
    */
    protected $description;

    /**
    * @ORM\Column(type="json_array", name="domain")
    */
    protected $domain;
    /**
    {
    id: 1,
    name: 'Azze',
    email: 'email@gmail.com',
    description: 'azze current account',
    domains: [
    {
    name: 'jesolo.com', +15087628612
    paths:[
    {description: 'booking path in 4 part',path: 'booking.html' },
    {description: 'inform paths in 3 part',path: 'inform.html' },
    {description: 'reservation paths in 2 part',path: 'reservation.html' },
    {description: 'offer path in 6 part',path: 'offers.html' }
    ]
    }
    ]
    }
     */

}