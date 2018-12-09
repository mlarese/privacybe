<?php

namespace GDPR\Entity\Privacy;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *     name="treatment_history",
 *     indexes={
 *          @ORM\Index(name="treatment_history_created", columns={"created"}),
 *          @ORM\Index(name="treatment_history_modifier", columns={"modifier"}),
 *          @ORM\Index(name="treatment_history_treatment_code", columns={"treatment_code"}),
 *     }
 * )
 */
class TreatmentHistory
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
     protected $id;

    /**
     * @ORM\Column(name="created", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    protected $created;

    /**
     * @ORM\Column(name="treatment", type="json", nullable=true)
     */
    protected $treatment;

    /**
     * @ORM\Column(name="treatment_code", type="string", nullable=false, length=128)
     */
    protected $treatmentCode;

    /**
     * @ORM\Column(name="modifier", type="integer", nullable=false)
     */
    protected $modifier;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return treatmentHistory
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     * @return treatmentHistory
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }





    /**
     * @return mixed
     */
    public function getModifier()
    {
        return $this->modifier;
    }

    /**
     * @param mixed $modifier
     * @return treatmentHistory
     */
    public function setModifier($modifier)
    {
        $this->modifier = $modifier;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return treatmentHistory
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getTreatment() {
        return $this->treatment;
    }

    /**
     * @param mixed $treatment
     *
     * @return TreatmentHistory
     */
    public function setTreatment($treatment) {
        $this->treatment = $treatment;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTreatmentCode() {
        return $this->treatmentCode;
    }

    /**
     * @param mixed $treatmentCode
     *
     * @return TreatmentHistory
     */
    public function setTreatmentCode($treatmentCode) {
        $this->treatmentCode = $treatmentCode;
        return $this;
    }

    /**
     * @param mixed $description
     * @return treatmentHistory
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }


    /**
     * @ORM\Column(name="type", type="string", nullable=false)
     */
    protected $type;

    /**
     * @ORM\Column(name="description", type="string", nullable=false)
     */
    protected $description;
}
