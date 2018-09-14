<?php

namespace App\Service;
use App\Service\MailUP\Lists;
use App\Service\MailUP\Recipient;
use function exp;
use FastRoute\RouteParser\Std;
use GuzzleHttp;

class MailUpService {

    private static $instance = null;
	private $urlEntryPoint = '';
	private $ownerId = '';


    /**
     * @return string
     */
    public function getOwnerId(): string {
        return $this->ownerId;
    }

    /**
     * @param string $ownerId
     *
     * @return MailUpService
     */
    public function setOwnerId(string $ownerId): MailUpService {
        $this->ownerId = $ownerId;
        return $this;
    }
	private $token = '';
	private $error = array ();
	private $serviceStatus = false;



    public function __construct($settigs,$nochek = true) {

		$this->serviceStatus = true;

    }

    public static function getInstance($settigs=null,$nochek = true) {
        if (! self::$instance) {

            self::$instance = new MailUpService ($settigs,$nochek = true);
        }

        return self::$instance;
    }



	public function getStatus() {
		return $this->serviceStatus;
	}

    /**
     * @param $owner
     *
     * @return \stdClass
     * @throws \App\Exception\MailUPListException
     */
	public function getAllContactLists($owner) {
		$lstServ =  new Lists();

        $ret = $lstServ->readByOwnerId($this->ownerId);


		return $ret;
	}

    /**
     * @param $owner
     *
     * @return \stdClass
     * @throws \App\Exception\MailUPListException
     */
    public function createContactLists($owner, $listName, array $params) {
        $lstServ =  new Lists();

        /** @var \stdClass $ret */
        $ret = $lstServ->createByOwnerId(
        	$this->ownerId,
			$listName,
			$params['usedForBusiness'],
			$params['usedForPrivate'],
			$params['ownerEmail'],
			$params['replyToEmail'],
			$params['senderName'],
			$params['companyName'],
			$params['contactName'],
			$params['address'],
			$params['city'],
			$params['countryCode'],
			$params['permissionReminder'],
			$params['websiteUrl'],
			$params['expireDate']
		);


        return $ret;
    }

    /**
     * @param        $listId
     * @param string $subscriberDomain
     *
     * @return array
     * @throws \App\Exception\MailUPListException
     * @throws \App\Exception\MailUPRecipientException
     */
    public function getContactListSubscribers($listId, $subscriberDomain='') {
		$srv = new Recipient();
        return $srv->getAllRecipientsFromAListByOwnerId($this->ownerId, $listId);
    }

	/**
	 *
	 * @param unknown $listId
	 * @param unknown $email
	 * @param number $confirmed
	 * @param string $format
	 * @param unknown $customfields
	 * @return boolean
	 */
	public function addSubscriber($listId, $email, $confirmed = 1, $name , $surname, $expireDate, $optionalFields = []) {

		$srv = new Recipient();
		$srv->addToListByOwnerId(
			$this->ownerId,
			$listId,
			$email,
			$name,
			$surname,
			$optionalFields,
			$expireDate
		);

		return false;
	}

	public function deleteSubscriber($listId, $email) {
			return false;
	}


	/**
	 *
	 * @return multitype:
	 */
	public function getLastError() {
		return $this->error;
	}

}
?>
