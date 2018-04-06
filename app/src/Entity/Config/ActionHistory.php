<?php
/**
 * Created by PhpStorm.
 * User: mauroadmin
 * Date: 06/04/18
 * Time: 08:08
 */

namespace App\Entity\Config;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="action_history")
 */

class ActionHistory
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
     protected $id;

    /**
     * @ORM\Column(name="type", type="string", nullable=false, length=50)
     */
    protected $type;

    /**
     * @ORM\Column(name="description", type="string", nullable=false)
     */
    protected $description;

    /**
     * @ORM\Column(name="date", type="datetime", options={"default"="CURRENT_TIMESTAMP"})
     */
    protected $date;

    /**
     * ActionHistory constructor.
     */
    public function __construct()
    {
        $this->date = new \DateTime();
    }


    /**
     * @ORM\Column(name="history", type="json", nullable=true)
     */
    protected $history;

    /**
     * @ORM\Column(name="user_name", type="string", nullable=false, string=50)
     */
    protected $userName;
}