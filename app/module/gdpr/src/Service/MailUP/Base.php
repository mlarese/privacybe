<?php

namespace GDPR\Service\MailUP;

use GuzzleHttp;
use GDPR\Exception\MailUPException;
use GDPR\Exception\MailUPTokenException;
use GDPR\Batch\EntityManagerBuilder;
use GDPR\Entity\Privacy\MailUpToken;
use GDPR\Service\MailUP\Token as MailUPTokenService;

class Base {

	use \GDPR\Action\Emails\EmailHelpers;

	/**
	 * GET type request
	 */
	const CALL_TYPE_GET = 'GET';

	/**
	 * POST type request
	 */
	const CALL_TYPE_POST = 'POST';

	/**
	 * POST type request
	 */
	const CALL_TYPE_DELETE = 'DELETE';

	/**
	 * API CALL max retry
	 */
	const CALL_MAX_RETRY = 10;

	/**
	 * Authorized call method used by MailUP API service
	 *
	 * @param int $ownerId
	 * @param MailUpToken $token
	 * @param string $callType
	 * @param string|null $resource
	 * @param array|string $payload
	 * @param array $optionalHeaders
	 * @param int $maxRetry
	 *
	 * @return \stdClass
	 * @throws MailUPException
	 * @throws \Exception
	 */
	protected function authorizedApiCall (
		int $ownerId = null,
		MailUpToken $token = null,
		string $callType = self::CALL_TYPE_GET,
		string $resource = null,
		$payload = [],
		array $optionalHeaders = [],
		int $maxRetry = self::CALL_MAX_RETRY
	) {
		if (!is_null($token)) {
			$optionalHeaders['Authorization'] = sprintf(
				'Bearer %s',
				$token->getToken()['access_token']
			);
		}
		try {
			return $this->simpleApiCall(
				$callType,
				$resource,
				$payload,
				$optionalHeaders
			);
		} catch (\Exception $e) {
			/**
			 * HTTP CODE 401 = expired token
			 * @link http://help.mailup.com/display/mailupapi/Authenticating+with+OAuth+v2
			 */
			if ($e->getCode() == 401 &&
			    !is_null($token)
			) {
				$tokenService = new MailUPTokenService();
				$token = $tokenService->refreshTokenByOwnerId($ownerId);
				return $this->authorizedApiCall(
					$ownerId,
					$token,
					$callType,
					$resource,
					$payload,
					$optionalHeaders,
					--$maxRetry
				);
			} else {
				throw $e;
			}
		}
	}

	/**
	 * Simple call method used by MailUP API service
	 *
	 * @param string $callType
	 * @param string|null $resource
	 * @param array|string $payload
	 * @param array $optionalHeaders
	 *
	 * @return \stdClass
	 * @throws MailUPException
	 * @throws \Exception
	 */
	protected function simpleApiCall (
		string $callType = self::CALL_TYPE_GET,
		string $resource = null,
		$payload = [],
		array $optionalHeaders = []
	) {
		$headers = [
			'Accept-Encoding' => 'gzip',
			'Accept' => 'application/json',
		];
		if (empty($resource)) {
			throw new MailUPException(sprintf(
				"Invalid or empty request resource: %s",
				$resource
			));
		}
		switch ($callType) {
			case self::CALL_TYPE_POST:
				if (is_array($payload)) {
					$payload = http_build_query($payload);
					$headers['Content-Type'] = 'application/x-www-form-urlencoded';
				} else {
					$headers['Content-Type'] = 'application/json';
				}
				break;
		}
		try {
			$client   = new GuzzleHttp\Client([
				'base_uri' => 'https://services.mailup.com' //@todo sandbox or production
			]);
			$options = [
				'allow_redirects' => true,
				'headers' => array_merge($headers, $optionalHeaders)
			];
			if ($callType == self::CALL_TYPE_POST) {
				$options['body'] = $payload;
			}
			$response = $client->request(
				$callType,
				$resource,
				$options
			);
		} catch (\Exception $e) {
			// @todo low level logging
			throw $e;
		}

		return json_decode($response->getBody()->getContents(), true);
	}

	/**
	 * Get the Doctrine Entity Manager by Owner ID
	 *
	 * @param $ownerId
	 *
	 * @return \Doctrine\ORM\EntityManager
	 * @throws MailUPException
	 * @throws MailUPTokenException
	 */
	protected function getEntityManagerByOwnerId (
		$ownerId
	) {
		if (empty($ownerId)) {
			throw new MailUPTokenException(sprintf(
				"Invalid or empty Owner ID",
				$ownerId
			));
		}

		$settings = $this->getSettings();
		$em = new EntityManagerBuilder($settings);
		/** @var \Doctrine\ORM\EntityManager $em */
		$em = $em->buildSUPrivateEM($ownerId);

		return $em;
	}

	/**
	 * Get SLIM app container
	 *
	 * @return \Psr\Container\ContainerInterface
	 * @throws MailUPException
	 */
	public function getContainer ()
	{
		$settings = $this->getSettings();
		$app = new \Slim\App($settings);
		$dependencies =  realpath(__DIR__ . '/../../../dependencies.php');
		if (!$settings) {
			throw new MailUPException('Cannot found dependencies.php file');
		}
		require $dependencies;
		return $app->getContainer();
	}

	/**
	 * Get settings file
	 *
	 * @return mixed
	 * @throws MailUPException
	 */
	protected function getSettings ()
	{
		$settings = realpath(__DIR__ . '/../../../settings_local.php');
		if (!$settings) {
			$settings = realpath(__DIR__ . '/../../../settings.php');
		}
		if (!$settings) {
			throw new MailUPException('Cannot found settings.php file');
		}
		return require $settings;
	}
}