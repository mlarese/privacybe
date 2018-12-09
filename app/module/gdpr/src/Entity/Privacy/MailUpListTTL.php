<?php

namespace GDPR\Entity\Privacy;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="mailup_list_ttl",indexes={
 *     @ORM\Index(name="mailup_list_ttl_guid", columns={"guid"}),
 *     @ORM\Index(name="mailup_list_expired_values", columns={"expire"})
 * })
 */

class MailUpListTTL {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="NONE")
	 */
	protected $id;

	/**
	 * @ORM\Column(name="guid", type="string", length=64)
	 */
	protected $guid;

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
	 * @return MailUpListTTL
	 */
	public function setId( $id ) {
		$this->id = $id;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getGuid() {
		return $this->guid;
	}

	/**
	 * @param mixed $guid
	 *
	 * @return MailUpListTTL
	 */
	public function setGuid( $guid ) {
		$this->guid = $guid;

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
	 * @return MailUpListTTL
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
	 * @return MailUpListTTL
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
	 * @return MailUpListTTL
	 */
	public function setUpdated( $updated ) {
		$this->updated = $updated;

		return $this;
	}
}