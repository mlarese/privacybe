<?php
/**
 * Created by PhpStorm.
 * User: mauro.larese
 * Date: 07/06/2018
 * Time: 11:36
 */

namespace App\Entity\Config;
use Doctrine\ORM\Mapping as ORM;
/**
 * ownerUserRequest
 * @ORM\Table(
 *     name="owner_user_request",
 *     indexes={
 *          @ORM\Index(name="owner_user_request_owner_id", columns={"owner_id"}),
 *          @ORM\Index(name="owner_user_request_user_request_id", columns={"user_request_id"})
 *     }
 *)
 * @ORM\Entity
 */
class OwnerUserRequest {
    /**
     * @return mixed
     */
    public function getOwnerId()
    {
        return $this->ownerId;
    }

    /**
     * @param mixed $ownerId
     * @return OwnerUserRequest
     */
    public function setOwnerId($ownerId)
    {
        $this->ownerId = $ownerId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserRequestId()
    {
        return $this->userRequestId;
    }

    /**
     * @param mixed $userRequestId
     * @return OwnerUserRequest
     */
    public function setUserRequestId($userRequestId)
    {
        $this->userRequestId = $userRequestId;
        return $this;
    }
    /**
     * @ORM\Id()
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="owner_id", type="integer", nullable=false)
     */
    protected $ownerId;

    /**
     * @ORM\Column(name="user_request_id", type="string", nullable=false, length=128)
     */
    protected $userRequestId;

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return OwnerUserRequest
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

}
