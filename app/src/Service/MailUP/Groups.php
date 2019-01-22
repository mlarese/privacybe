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
     * @param int $ownerId
     * @param int $listId
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

    /**
     * @param int $ownerId
     * @param int $listId
     * @param string $groupName
     * @param string $note
     * @return \stdClass
     * @throws MailUPListException
     */
    public function createByOwnerId (
        int $ownerId,
        int $listId,
        string $groupName,
        string $note = ''
    ) {

        if (empty($ownerId)) {
            throw new MailUPRecipientException(sprintf(
                "Wrong Owner ID"
            ));
        }
        if (empty($listId)) {
            throw new MailUPRecipientException(sprintf(
                "Wrong List ID"
            ));
        }

        if (empty($groupName)) {
            throw new MailUPListException(sprintf(
                "Wrong group name (max 50 characters)"
            ));
        }
        $groupName = trim(substr($groupName, 0, 50));


        $note = trim(substr($note, 0, 100));


        $tokenService = new MailUPTokenService();
        $token = $tokenService->getTokenByOwnerId($ownerId);
        try {


            $result = $this->authorizedApiCall (
                $ownerId,
                $token,
                self::CALL_TYPE_POST,
                sprintf(
                    '/API/v1.1/Rest/ConsoleService.svc/Console/List/%s/Group',
                    $listId
                ),
                json_encode([
                    'Name' => $groupName,
                    'Notes' => $note
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


        return $result;
    }


    /**
     * @param int $ownerId
     * @param int $listId
     * @param int $groupId
     * @param string $groupName
     * @param string $note
     * @return \stdClass
     * @throws MailUPListException.
     */
    public function updateByOwnerId (
        int $ownerId,
        int $listId,
        int $groupId,
        string $groupName,
        string $note = ''
    ) {

        if (empty($ownerId)) {
            throw new MailUPRecipientException(sprintf(
                "Wrong Owner ID"
            ));
        }
        if (empty($listId)) {
            throw new MailUPRecipientException(sprintf(
                "Wrong List ID"
            ));
        }

        if (empty($groupId)) {
            throw new MailUPRecipientException(sprintf(
                "Wrong Group ID"
            ));
        }


        if (empty($groupName)) {
            throw new MailUPListException(sprintf(
                "Wrong group name (max 50 characters)"
            ));
        }
        $groupName = trim(substr($groupName, 0, 50));


        $note = trim(substr($note, 0, 100));


        $tokenService = new MailUPTokenService();
        $token = $tokenService->getTokenByOwnerId($ownerId);
        try {


            $result = $this->authorizedApiCall (
                $ownerId,
                $token,
                self::CALL_TYPE_PUT,
                sprintf(
                    '/API/v1.1/Rest/ConsoleService.svc/Console/List/%s/Group/%s',
                    $listId,$groupId
                ),
                json_encode([
                    'Name' => $groupName,
                    'Notes' => $note
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


        return $result;
    }


    /**
     * Delete MailUP list by Owner ID
     *
     * @param int $ownerId
     * @param MailUpListTTL $listTTL
     *
     * @return \stdClass
     * @throws MailUPListException
     */
    public function deleteByOwnerId (
        int $ownerId,
        int $listId,
        int $groupId
    ) {


        if (empty($ownerId)) {
            throw new MailUPRecipientException(sprintf(
                "Wrong Owner ID"
            ));
        }
        if (empty($listId)) {
            throw new MailUPRecipientException(sprintf(
                "Wrong List ID"
            ));
        }

        if (empty($groupId)) {
            throw new MailUPRecipientException(sprintf(
                "Wrong Group ID"
            ));
        }

        $tokenService = new MailUPTokenService();
        $token = $tokenService->getTokenByOwnerId($ownerId);
        try {
            $result = $this->authorizedApiCall (
                $ownerId,
                $token,
                self::CALL_TYPE_DELETE,
                sprintf(
                    '/API/v1.1/Rest/ConsoleService.svc/Console/List/%s/Group/%s',
                    $listId,$groupId
                ),
                []
            );
        } catch (\Exception $e) {
            throw new MailUPListException($e);
        }


        return $result;
    }
}
