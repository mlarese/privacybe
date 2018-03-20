<?php
/**
 * Created by PhpStorm.
 * User: mauro.larese
 * Date: 19/03/2018
 * Time: 23:19
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 *
 * Class Term
 * @ORM\Entity()
 * @ORM\Table(name="term")
 */
class Term {
    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=36)
     * @ORM\GeneratedValue(strategy="NONE")
     */
    protected $id;

    /**
     * Term constructor.
     *
     * @param $id
     */
    public function __construct() {$this->id = Uuid::uuid4()->toString(); }

    /**
     * @return mixed
     */
    public function getId() {

        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return Term
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param mixed $name
     *
     * @return Term
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;

}