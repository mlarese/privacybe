<?php

namespace App\Service\MailUP;

use App\Entity\Privacy\MailUpToken;
use App\Exception\MailUPException;
use App\Exception\MailUPTokenException;
use App\Entity\Config\OwnerRepository;

class Token extends Base {

	/**
	 * Minimum tokens in log
	 */
	const TOKEN_MIN = 1;

	/**
	 * Max retention days of tokens in log
	 */
	const TOKEN_MAX_DAYS_RETENTION = 90;

    /**
     * Get a new MailUP token by Owner ID
     *
     * @param int $ownerId
     * @param string $username
     * @param string $password
     * @param string $clientId
     * @param string $clientSecret
     * @param $alertEmail
     * @return MailUPToken
     * @throws MailUPException
     * @throws MailUPTokenException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
	public function getNewTokenByOwnerId (
		$ownerId,
		$username,
		$password,
		$clientId,
		$clientSecret,
		$alertEmail
	) {

		// Get the entity manager
		$em = $this->getEntityManagerByOwnerId($ownerId);

		// Get a new token
		$token = $this->getNewToken(
			$username,
			$password,
			$clientId,
			$clientSecret
		);

		// Save the token
		$mailUpToken = new MailUPToken();
		$mailUpToken->setClientId($clientId)
			->setClientSecret($clientSecret)
			->setToken($token)
			->setCreated(new \DateTime('now'))
			->setStatus(MailUpToken::STATUS_ENABLED)
			->setAlertEmail($alertEmail);
		$em->persist($mailUpToken);
		$em->flush();

		return $mailUpToken;
	}

	/**
	 * Get a new MailUP token using “Resource Owner Password Grant” method
	 *
	 * @param string|null $username
	 * @param string|null $password
	 * @param string|null $clientId
	 * @param string|null $clientSecret
	 *
	 * @return \stdClass
	 * @throws MailUPTokenException
	 */
	public function getNewToken (
		$username = null,
		$password = null,
		$clientId = null,
		$clientSecret = null
	) {
		if (empty($username)) {
			throw new MailUPTokenException(sprintf(
				"Invalid or empty token username: %s",
				$username
			));
		}
		if (empty($password)) {
			throw new MailUPTokenException(sprintf(
				"Invalid or empty token password: %s",
				$password
			));
		}
		if (empty($clientId)) {
			throw new MailUPTokenException(sprintf(
				"Invalid or empty token client ID: %s",
				$clientId
			));
		}
		if (empty($clientSecret)) {
			throw new MailUPTokenException(sprintf(
				"Invalid or empty token client Secret: %s",
				$clientSecret
			));
		}

		// Get the new token
		try {
			return $this->simpleApiCall(
				self::CALL_TYPE_POST,
				'/Authorization/OAuth/Token',
				[
					'grant_type'    => 'password',
					'client_id'     => $clientId,
					'client_secret' => $clientSecret,
					'username'      => $username,
					'password'      => $password
				]
			);
		} catch (\Exception $e) {
			throw new MailUPTokenException($e);
		}
	}

    /**
     * Get the current MailUP token by Owner ID
     *
     * @param int $ownerId
     *
     * @return MailUPToken
     * @throws MailUPException
     * @throws MailUPTokenException
     */
	public function getTokenByOwnerId (
		$ownerId
	) {

		// Get the entity manager
		$em = $this->getEntityManagerByOwnerId($ownerId);

		// Get the token
		/** @var MailUPToken $token */
		$token = $em->getRepository(MailUPToken::class)
			->findOneBy ([
				'status' => MailUPToken::STATUS_ENABLED
			], [
				'id' => 'DESC'
			]);

 		return $token;
	}

    /**
     * Refresh MailUP token by Owner ID
     *
     * @param int $ownerId
     *
     * @return MailUPToken
     * @throws MailUPException
     * @throws MailUPTokenException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
	public function refreshTokenByOwnerId (
		$ownerId
	) {

		// Get the last generated token
		/** @var MailUPToken $token */
		$token = $this->getTokenByOwnerId($ownerId);
		if (is_null($token)) {
			throw new MailUPTokenException(sprintf(
				'Cannot refresh the token because no token exists'
			));
		}

		// Get the entity manager
		$em = $this->getEntityManagerByOwnerId($ownerId);

		// Get the new token
		try {
			$refreshedToken = $this->simpleApiCall (
				self::CALL_TYPE_POST,
				'/Authorization/OAuth/Token',
				[
					'grant_type' => 'refresh_token',
					'client_id' => $token->getClientId(),
					'client_secret' => $token->getClientSecret(),
					'refresh_token' => $token->getToken()['refresh_token']
				]
			);
		} catch (\Exception $e) {
			// Use Action/Emails directory
			chdir(realpath(getcwd() . '/app/src/Action/Emails/'));
			$this->sendGenericEmail (
				$this->getContainer(),
				[ 'error_message' => sprintf(
					'Non è possibile eseguire il refresh del token %s per l\'owner ID %s',
					json_encode($token->getToken()),
					$ownerId
				)],
				'mailup/error',
		        'it',
		        'privacy@mm-one.com',
		        $token->getAlertEmail(),
				'dataone_emails',
				'ATTENZIONE: problema di refresh del token di MailUP'
			);
			throw new MailUPTokenException($e);
		}

		// Save the token
		$mailUpToken = new MailUPToken();
		$mailUpToken->setClientId($token->getClientId())
		            ->setClientSecret($token->getClientSecret())
		            ->setToken($refreshedToken)
		            ->setCreated(new \DateTime('now'))
		            ->setStatus(MailUpToken::STATUS_ENABLED)
					->setAlertEmail($token->getAlertEmail());
		$em->persist($mailUpToken);
		$em->flush();

		// Token queue maintenance
		$this->maintenanceTokenByOwnerId($ownerId);

		return $mailUpToken;
	}

    /**
     * Maintenance MailUP token by Owner ID
     *
     * @param int $ownerId
     *
     * @return int
     * @throws MailUPTokenException
     * @throws MailUPException
     */
	public function maintenanceTokenByOwnerId (
		$ownerId
	) {

		// Get the entity manager
		$em = $this->getEntityManagerByOwnerId($ownerId);

		// Check minimum quantity
		if (count($em->getRepository(MailUPToken::class)->findAll()) <= self::TOKEN_MIN) {
			return 0;
		}

		// Get the token
		/** @var MailUPToken $token */
		$day = new \DateTime('now');
		$day->modify(sprintf(
			'-%s days',
			self::TOKEN_MAX_DAYS_RETENTION
		));
		/** @var \Doctrine\ORM\Query $q */
		$q = $em->createQuery(sprintf(
			"DELETE FROM %s AS t WHERE t.created < '%s'",
			MailUPToken::class,
			$day->format('Y-m-d H:i:s')
		));
		return $q->execute();
	}
}