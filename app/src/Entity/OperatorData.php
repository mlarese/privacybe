<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *     name="operator_data"
 * )
 */
class OperatorData {
    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void {
        $this->id = $id;
    }
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;
}