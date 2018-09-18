<?php

namespace App\Service;
use App\Entity\Privacy\MailUpListTTL;
use App\Service\MailUP\Lists;
use App\Service\MailUP\Recipient;
use DateTime;
use function exp;
use FastRoute\RouteParser\Std;
use GuzzleHttp;
use function is_string;

class MailUpService {

    private static $instance = null;
	private $urlEntryPoint = '';
	private $ownerId = '';
    private $exintingLists = null;

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
	public function getAllContactLists() {
		if(!isset($this->exintingLists))
        	$this->exintingLists = $this->getListSrv()->readByOwnerId($this->ownerId);
        return $this->exintingLists;
	}
	/** @var Lists */
	private $listSrv = null;

    /**
     * @return Lists
     */
    public function getListSrv(): Lists {
    	if(!isset($this->lstServ)) $this->lstServ=new Lists();
        return $this->lstServ;
    }

    /** @var Lists */
    private $recipientSrv = null;

    public function getRecipientSrv(): Lists {
        if(!isset($this->recipientSrv)) $this->recipientSrv=new Recipient();
        return $this->recipientSrv;
    }



	public function listExist($listName) {

		$lists = $this->getAllContactLists();

        foreach ($lists as $list) {

        	var_dump($list);
			if($list->Name === $listName)  {
				return $list;
			}
		}

		return false;
	}

    /**
     * @param       $listName
     * @param array $params
     *
     * @return MailUpListTTL
     * @throws \App\Exception\MailUPException
     * @throws \App\Exception\MailUPListException
     * @throws \App\Exception\MailUPTokenException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function createContactList($listName, array $params) {
        $ret = $this->getListSrv()->createByOwnerId(
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
     * @return mixed
     */
    public function getContactListSubscribers($listId, $subscriberDomain='') {
        return $this->getRecipientSrv()->getAllRecipientsFromAListByOwnerId($this->ownerId, $listId);
    }

    /**
     * @param          $listId
     * @param          $email
     * @param int      $confirmed
     * @param          $name
     * @param          $surname
     * @param DateTime $expireDate
     * @param array    $optionalFields
     *
     * @return bool
     * @throws \App\Exception\MailUPListException
     * @throws \App\Exception\MailUPRecipientException
     */
	public function addSubscriber($listId, $email, $confirmed = 1, $name , $surname, DateTime $expireDate,array $optionalFields = []) {

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
     * @return array
     */
	public function getLastError() {
		return $this->error;
	}

}
?>
