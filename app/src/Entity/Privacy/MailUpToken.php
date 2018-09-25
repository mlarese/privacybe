<?php

namespace App\Entity\Privacy;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="mailup_token")
 */

class MailUpToken {

	/**
	 * Enabled token status
	 */
	const STATUS_ENABLED = 1;

	/**
	 * Disabled token status
	 */
	const STATUS_DISABLED = 0;

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\Column(name="alertemail", type="string", nullable=false, length=128)
	 */
	protected $alertEmail;

	/**
	 * @ORM\Column(name="clientid", type="string", nullable=false, length=128)
	 */
	protected $clientId;

	/**
	 * @ORM\Column(name="clientsecret", type="string", nullable=false, length=128)
	 */
	protected $clientSecret;

	/**
	 * @ORM\Column(name="token", type="json", nullable=false)
	 */
	protected $token;

	/**
	 * @ORM\Column(name="created", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
	 */
	protected $created;

	/**
	 * @ORM\Column(name="updated", type="datetime", nullable=true)
	 */
	protected $updated;

	/**
	 * @ORM\Column(name="status", type="integer", nullable=false)
	 */
	protected $status;

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return mixed
	 */
	public function getAlertEmail() {
		return $this->alertEmail;
	}

	/**
	 * @param mixed $alertEmail
	 *
	 * @return MailUpToken
	 */
	public function setAlertEmail( $alertEmail ) {
		$this->alertEmail = $alertEmail;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getClientId() {
		return $this->clientId;
	}

	/**
	 * @param mixed $clientId
	 *
	 * @return MailUpToken
	 */
	public function setClientId( $clientId ) {
		$this->clientId = $clientId;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getClientSecret() {
		return $this->clientSecret;
	}

	/**
	 * @param mixed $clientSecret
	 *
	 * @return MailUpToken
	 */
	public function setClientSecret( $clientSecret ) {
		$this->clientSecret = $clientSecret;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getToken() {
		return $this->token;
	}

	/**
	 * @param mixed $token
	 *
	 * @return MailUpToken
	 */
	public function setToken( $token ) {
		$this->token = $token;

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
	 * @return MailUpToken
	 */
	public function setCreated( $created ) {
		$this->created = $created;

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
	 * @return MailUpToken
	 */
	public function setUpdated( $updated ) {
		$this->updated = $updated;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * @param mixed $status
	 *
	 * @return MailUpToken
	 */
	public function setStatus( $status ) {
		$this->status = $status;

		return $this;
	}
}