<?php
/**
 * Created by PhpStorm.
 * User: Courage
 * Date: 12/06/2018
 * Time: 11:16
 */

namespace App\Entity\Config;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="CP")
 */

class CP
{
    /**
     * @ORM\id()
     * @ORM\Column(name="code_id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(name="cp_name", type="string", length=100, nullable=false)
     */
    protected $cpName;
    /**
     * @ORM\Column(name="cp_token", type="integer")
     * @ORM\GeneratedValue()
     */
    protected $cpToken;

    /**
     * @ORM\Column(name="wind_pb_mt_user", type="string", length=100)
     */
    protected $windPbMtUser;
    /**
     * @ORM\Column(name="wind_pb_mt_pwd", type="string")
     */
    protected $windPbMtPwd;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCpName()
    {
        return $this->cpName;
    }

    /**
     * @param mixed $cpName
     */
    public function setCpName($cpName)
    {
        $this->cpName = $cpName;
    }

    /**
     * @return mixed
     */
    public function getCpToken()
    {
        return $this->cpToken;
    }

    /**
     * @param mixed $cpToken
     */
    public function setCpToken($cpToken)
    {
        $this->cpToken = $cpToken;
    }

    /**
     * @return mixed
     */
    public function getWindPbMtUser()
    {
        return $this->windPbMtUser;
    }

    /**
     * @param mixed $windPbMtUser
     */
    public function setWindPbMtUser($windPbMtUser)
    {
        $this->windPbMtUser = $windPbMtUser;
    }

    /**
     * @return mixed
     */
    public function getWindPbMtPwd()
    {
        return $this->windPbMtPwd;
    }

    /**
     * @param mixed $windPbMtPwd
     */
    public function setWindPbMtPwd($windPbMtPwd)
    {
        $this->windPbMtPwd = $windPbMtPwd;
    }

    /**
     * @return mixed
     */
    public function getTimEndCspName()
    {
        return $this->timEndCspName;
    }

    /**
     * @param mixed $timEndCspName
     */
    public function setTimEndCspName($timEndCspName)
    {
        $this->timEndCspName = $timEndCspName;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param mixed $creationDate
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }
    /**
     * @ORM\Column(name="tim_end_csp_name", type="string")
     */
    protected $timEndCspName;
    /**
     * @ORM\Column(name="Status_Id", type="boolean", nullable=false)
     */
    protected $status;
    /**
     * @ORM\Column(name="creation_date", type="datetime")
     */
    protected $creationDate;


}