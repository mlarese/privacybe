<?php

namespace App\Entity\Privacy;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="mailup_recipient_ttl",indexes={
 *     @ORM\Index(name="mailup_recipient_expired_values", columns={"expire"})
 * })
 */

class MailUpRecipientTTL {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="NONE")
	 */
	protected $id;

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="NONE")
	 */
	private $list;

	/**
	 * @ORM\Column(name="created", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
	 */
	protected $created;

	/**
	 * @ORM\Column(name="expire", type="datetime", nullable=false)
	 */
	protected $expire;

	/**
	 * @ORM\Column(name="updated", type="datetime", nullable=true)
	 */
	protected $updated;

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param mixed $id
	 *
	 * @return MailUpRecipientTTL
	 */
	public function setId( $id ) {
		$this->id = $id;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getList() {
		return $this->list;
	}

	/**
	 * @param mixed $list
	 *
	 * @return MailUpRecipientTTL
	 */
	public function setList( $list ) {
		$this->list = $list;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCreated() {
		return $this->created;
	}

	/**
	 * @param mixed $created
	 *
	 * @return MailUpRecipientTTL
	 */
	public function setCreated( $created ) {
		$this->created = $created;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getExpire() {
		return $this->expire;
	}

	/**
	 * @param mixed $expire
	 *
	 * @return MailUpRecipientTTL
	 */
	public function setExpire( $expire ) {
		$this->expire = $expire;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getUpdated() {
		return $this->updated;
	}

	/**
	 * @param mixed $updated
	 *
	 * @return MailUpRecipientTTL
	 */
	public function setUpdated( $updated ) {
		$this->updated = $updated;

		return $this;
	}
}