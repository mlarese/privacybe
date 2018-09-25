<?php

namespace App\Service\MailUP;

use App\Service\MailUP\Token as MailUPTokenService;
use App\Entity\Privacy\MailUpToken;
use App\Exception\MailUPException;
use App\Exception\MailUPResourceException;

class Resource extends Base {

	/**
	 * Get Country codes list path
	 *
	 * @return string
	 */
	protected function getCountryCodesListPath ()
	{
		return realpath(__DIR__ . '/../../Helpers/MailUP/') . DIRECTORY_SEPARATOR . 'CountryCodesList.php';
	}

	/**
	 * Refresh MailUP Country codes list
	 *
	 * @param int $ownerId
	 *
	 * @throws MailUPResourceException
	 */
	public function refreshCountryCodesListByOwnerId (
		int $ownerId
	) {
		$tokenService = new MailUPTokenService();
		$token = $tokenService->getTokenByOwnerId($ownerId);
		try {
			$result = $this->authorizedApiCall (
				$ownerId,
				$token,
				self::CALL_TYPE_GET,
				'/API/v1.1/Rest/ConsoleService.svc/Console/List/Countries',
				[]
			);
		} catch (\Exception $e) {
			throw new MailUPResourceException($e);
		}

		if (!empty($result)) {
			file_put_contents(
				$this->getCountryCodesListPath(),
				sprintf(
					"<?php\n\n return %s;\n",
					var_export($result, true)
				)
			);
		}
	}

	/**
	 * Get MailUP cached country codes
	 *
	 * @return mixed
	 */
	public function getCountryCodes ()
	{
		return require $this->getCountryCodesListPath();
	}

	/**
	 * Filter by available country codes
	 *
	 * @param string $countryCode
	 *
	 * @return bool
	 */
	public function filterByAvailableCountryCode (
		string $countryCode
	) {
		foreach ($this->getCountryCodes() as $item) {
			if ($item['CountryCode'] == $countryCode) {
				return true;
			}
		}

		return false;
	}
}