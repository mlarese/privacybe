<?php

namespace App\Service\MailUP;

use App\Exception\MailUPListException;
use App\Service\MailUP\Token as MailUPTokenService;
use App\Service\MailUP\Resource as MailUPResourceService;
use App\Entity\Privacy\MailUpListTTL;
use Console\Helper\Log as LogHelper;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

class Groups extends Base {

	/**
	 * Read MailUP lists by Owner ID
	 *
	 * @param int $ownerId
	 *
	 * @return \stdClass
	 * @throws MailUPListException
	 */
	public function readByOwnerId (
		int $ownerId,int $listId
	) {
		$tokenService = new MailUPTokenService();
		$token = $tokenService->getTokenByOwnerId($ownerId);
		try {
			$result = $this->authorizedApiCall (
				$ownerId,
				$token,
				self::CALL_TYPE_GET,
                sprintf(
                    '/API/v1.1/Rest/ConsoleService.svc/Console/List/%s/Groups',
                    $listId
                ),
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



}
