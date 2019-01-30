<?php

namespace App\Service\MailUP;

use App\Exception\MailUPListException;
use App\Service\MailUP\Token as MailUPTokenService;
use App\Service\MailUP\Resource as MailUPResourceService;
use App\Entity\Privacy\MailUpListTTL;
use Console\Helper\Log as LogHelper;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

class Lists extends Base {

    /**
     * Read MailUP lists by Owner ID
     *
     * @param int $ownerId
     *
     * @return \stdClass
     * @throws MailUPListException
     * @throws \App\Exception\MailUPException
     * @throws \App\Exception\MailUPTokenException
     */
	public function readByOwnerId (
		int $ownerId
	) {
		$tokenService = new MailUPTokenService();
		$token = $tokenService->getTokenByOwnerId($ownerId);
		try {
			$result = $this->authorizedApiCall (
				$ownerId,
				$token,
				self::CALL_TYPE_GET,
				'/API/v1.1/Rest/ConsoleService.svc/Console/List',
				[]
			);
		} catch (\Exception $e) {
			throw new MailUPListException($e);
		}

		if (!empty($result) && isset($result['Items'])) {
			return $result['Items'];
		}
		return $result;
	}

    /**
     * Get list details
     *
     * @param int $ownerId
     * @param int $listid
     * @return \stdClass
     * @throws MailUPListException
     * @throws \App\Exception\MailUPException
     * @throws \App\Exception\MailUPTokenException
     */
    public function getDetails (
        int $ownerId,
        int $listid
    ) {
        $tokenService = new MailUPTokenService();
        $token = $tokenService->getTokenByOwnerId($ownerId);
        try {
            return $this->authorizedApiCall (
                $ownerId,
                $token,
                self::CALL_TYPE_GET,
                sprintf(
                    '/API/v1.1/Rest/ConsoleService.svc/Console/List/%s',
                    $listid
                )
            );
        } catch (\Exception $e) {
            throw new MailUPListException($e);
        }
    }

    /**
     * Create a list by owner ID
     *
     * @param int       $ownerId
     * @param string    $listName
     * @param bool      $usedForBusiness
     * @param bool      $usedForPrivate
     * @param string    $ownerEmail
     * @param string    $replyToEmail
     * @param string    $senderName
     * @param string    $companyName
     * @param string    $contactName
     * @param string    $address
     * @param string    $city
     * @param string    $countryCode
     * @param string    $permissionReminder
     * @param string    $websiteUrl
     * @param \DateTime $expireDate
     *
     * @return MailUpListTTL
     * @throws MailUPListException
     * @throws \App\Exception\MailUPException
     * @throws \App\Exception\MailUPTokenException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
	public function createByOwnerId (
		int $ownerId,
		string $listName,
		bool $usedForBusiness = true,
		bool $usedForPrivate = true,
		string $ownerEmail,
		string $replyToEmail,
		string $senderName,
		string $companyName,
		string $contactName,
		string $address,
		string $city,
		string $countryCode,
		string $permissionReminder,
		string $websiteUrl,
		\DateTime $expireDate
	) {
		if (empty($listName)) {
			throw new MailUPListException(sprintf(
				"Wrong List name (max 50 characters)"
			));
		}
		$listName = trim(substr($listName, 0, 50));
		if (filter_var($ownerEmail, FILTER_VALIDATE_EMAIL) === false) {
			throw new MailUPListException(sprintf(
				"Wrong %s email address that is sending the message",
				$ownerEmail
			));
		}
		if (filter_var($replyToEmail, FILTER_VALIDATE_EMAIL) === false) {
			throw new MailUPListException(sprintf(
				"Wrong %s replay email address that is used for replay to sent message",
				$replyToEmail
			));
		}
		if (empty($senderName)) {
			throw new MailUPListException(sprintf(
				"Wrong sender name"
			));
		}
		$senderName = trim($senderName);
		if (empty($companyName)) {
			throw new MailUPListException(sprintf(
				"Wrong company name"
			));
		}
		$companyName = trim($companyName);
		if (empty($contactName)) {
			throw new MailUPListException(sprintf(
				"Wrong contact reference name"
			));
		}
		$contactName = trim($contactName);
		if (empty($address)) {
			throw new MailUPListException(sprintf(
				"Wrong company address"
			));
		}
		$address = trim($address);
		if (empty($city)) {
			throw new MailUPListException(sprintf(
				"Wrong company city"
			));
		}
		$city = trim($city);
		$resourceService = new MailUPResourceService();
		if ($resourceService->filterByAvailableCountryCode(strtoupper(trim($countryCode))) === false) {
			throw new MailUPListException(sprintf(
				"Wrong company country code %s",
				$countryCode
			));
		}
		$countryCode = strtoupper(trim($countryCode));
		if (empty($permissionReminder)) {
			throw new MailUPListException(sprintf(
				"Wrong remind recipients"
			));
		}
		$permissionReminder = trim($permissionReminder);
		if (filter_var($websiteUrl, FILTER_VALIDATE_URL) === false) {
			throw new MailUPListException(sprintf(
				"Wrong company website url %s",
				$websiteUrl
			));
		}
		$websiteUrl = trim($websiteUrl);

		$tokenService = new MailUPTokenService();
		$token = $tokenService->getTokenByOwnerId($ownerId);
		try {
			$result = $this->authorizedApiCall (
				$ownerId,
				$token,
				self::CALL_TYPE_POST,
				'/API/v1.1/Rest/ConsoleService.svc/Console/List',
				json_encode([
					'Name' => $listName,
                    'Business' => $usedForBusiness,
                    'Customer' => $usedForPrivate,
                    'OwnerEmail' => $ownerEmail,
                    'ReplyTo' => $replyToEmail,
                    'NLSenderName' => $senderName,
                    'CompanyName' => $companyName,
                    'ContactName' => $contactName,
                    'Address' => $address,
                    'City' => $city,
                    'CountryCode' => $countryCode,
                    'PermissionReminder' => $permissionReminder,
                    'WebSiteUrl' => $websiteUrl,
                    'UseDefaultSettings' => true
				])
			);
		}
        catch (ServerException $es){

            throw new MailUPListException($es->getResponse()->getBody(),$es->getResponse()->getStatusCode());
        }
        catch (ClientException $eg){

            throw new MailUPListException($eg->getResponse()->getBody(),$eg->getResponse()->getStatusCode());
        }
		catch (\Exception $e) {

			throw new MailUPListException($e);
		}

		// Get the entity manager
		$em = $this->getEntityManagerByOwnerId($ownerId);

		// Add expire date to created list
		$listTTL = new MailUpListTTL();
		$listTTL->setId($result['IdList'])
			->setGuid($result['ListGuid'])
			->setCreated(new \DateTime('now'))
			->setExpire($expireDate);
		$em->persist($listTTL);
		$em->flush();

		return $listTTL;
	}

    /**
     * Maintenance MaiLUP list by Owner ID
     *
     * @param int $ownerId
     *
     * @return null
     * @throws \App\Exception\MailUPException
     * @throws \App\Exception\MailUPTokenException
     */
	public function maintenanceListsByOwnerId (
		int $ownerId
	) {

		// Get the entity manager
		$em = $this->getEntityManagerByOwnerId($ownerId);

		// Get all expired lists
		$now = new \DateTime('now');
		/** @var \Doctrine\ORM\Query $q */
		$q = $em->createQuery(sprintf(
			"SELECT l.id, l.guid FROM %s AS l WHERE l.expire <= '%s'",
			MailUpListTTL::class,
			$now->format('Y-m-d H:i:s')
		));
		$result = $q->execute();
		if (empty($result)) {
			return null;
		}
		$log = new LogHelper();
		foreach ($result as $list) {
			/** @var MailUpListTTL $listTTL */
			$listTTL = $em->getRepository(MailUpListTTL::class)
				->findOneBy([
					'id' => $list['id']
				]);
			try {

				// Delete list from MailUP
				$res = $this->deleteByOwnerId (
					$ownerId,
					$listTTL
				);
			} catch (\Exception $e) {

				// Save error to log
				$log->error(sprintf(
					$e->getMessage()
				), $e);

				// Send an error email
				$tokenService = new MailUPTokenService();
				$token = $tokenService->getTokenByOwnerId($ownerId);
				$this->sendGenericEmail (
					$this->getContainer(),
					[ 'error_message' => sprintf(
						'Errore durante l\'eliminazione della lista %s per l\'owner ID %s: %s',
						$listTTL->getId(),
						$ownerId,
						$e->getMessage()
					)],
					'mailup/error',
					'it',
					'privacy@mm-one.com',
					$token->getAlertEmail(),
					'dataone_emails',
					'ATTENZIONE: problema di eliminazione di una lista di MailUP'
				);

			}
		}
	}

    /**
     * Delete MailUP list by Owner ID
     *
     * @param int $ownerId
     * @param MailUpListTTL $listTTL
     *
     * @return \stdClass
     * @throws MailUPListException
     * @throws \App\Exception\MailUPException
     * @throws \App\Exception\MailUPTokenException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
	public function deleteByOwnerId (
		int $ownerId,
		MailUpListTTL $listTTL
	) {

		// Get the entity manager
		$em = $this->getEntityManagerByOwnerId($ownerId);

		// Merge entity before delete (if entity was detached )
		$listTTL = $em->merge($listTTL);

		$tokenService = new MailUPTokenService();
		$token = $tokenService->getTokenByOwnerId($ownerId);
		try {
			$result = $this->authorizedApiCall (
				$ownerId,
				$token,
				self::CALL_TYPE_DELETE,
				sprintf(
					'/API/v1.1/Rest/ConsoleService.svc/Console/List/%s',
					$listTTL->getId()
				),
				[],
				[
					'if-match' => $listTTL->getGuid()
				]
			);
		} catch (\Exception $e) {
			throw new MailUPListException($e);
		}

		// Delete entity
		$em->remove($listTTL);
		$em->flush();

		return $result;
	}
}
