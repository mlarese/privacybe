<?php

namespace App\Service;
use App\Entity\Privacy\MailUpListTTL;
use App\Service\MailUP\Groups;
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
	 * @var Groups
	 */
	private $grpServ = null;

    /**
     * @return Lists
     */
    public function getListSrv(): Lists {
    	if(!isset($this->lstServ)) $this->lstServ=new Lists();
        return $this->lstServ;
    }


	/**
	 * @return Groups
	 */
	public function getGroupSrv(): Groups {
		if(!isset($this->grpServ)) $this->grpServ=new Groups();
		return $this->grpServ;
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

			if(is_object($list) && property_exists($list,'Name') && $list->Name === $listName)  {
				return $list;
			}
			elseif(is_array($list) && isset($list['Name']) && $list['Name'] == $listName) {
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
	 * @param       $listName
	 * @param array $params
	 *
	 * @return MailUpListTTL
	 * @throws \App\Exception\MailUPException
	 * @throws \App\Exception\MailUPListException
	 * @throws \App\Exception\MailUPTokenException
	 * @throws \Doctrine\ORM\OptimisticLockException
	 */
	public function createGroup($groupName, array $params) {

		$result = $this->getListSrv()->readByOwnerId($this->ownerId);

		if(!$result || empty($result)){
			$result[] = $this->createContactList('A DATAONE LIST ' . date('Y-m-d') ,$params);
		}

		$gresult = false;

		foreach ($result as $k => $list) {

			try {

				$gresult = $this->getGroupSrv()->createByOwnerId(
					$this->ownerId,
					$list['IdList'],
					$groupName,'A DATAONE GROUP'
				);

			} catch (\Exception $e) {
				$message = json_decode($e->getMessage());

				if($message!==false && $message->ErrorCode == 400){

					$groups = $this->getGroupSrv()->readByOwnerId($this->ownerId,$list['IdList']);
					$deleted = false;
					foreach ($groups as $kh => $groupdata ){
						if($groupdata['Name']==$groupName ){

							$this->getGroupSrv()->deleteByOwnerId($this->ownerId,$list['IdList'],$groupdata['idGroup']);
							$deleted = true;
							break;
						}
					}
					if($deleted){
						    $gresult =$this->getGroupSrv()->createByOwnerId(2, $list['IdList'], "TEST - MMONE - GRUPPO 1", "TEST DESCRIPTION");
					}

				}
			}
			break;
		}


		return $gresult;
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

    /**
     * @param $listId
     * @param DateTime $expireDate
     * @param array $recipients
     * @return bool
     * @throws \App\Exception\MailUPListException
     * @throws \App\Exception\MailUPRecipientException
     */
    public function addMultipleSubscriber($listId, DateTime $expireDate,array $recipients) {

        $srv = new Recipient();

		foreach ($recipients as $k => $recipient){
            $recipients[$k]['Email'] = trim($recipients[$k]['email']);
			$recipients[$k]['expireDate'] = $expireDate;
		}

        $srv->addMultipleRecipientsToListByOwnerId(
            $this->ownerId,
            $listId,
            $recipients);

        return false;
    }


	/**
	 * @param $groupId
	 * @param DateTime $expireDate
	 * @param array $recipients
	 * @return bool
	 * @throws \App\Exception\MailUPListException
	 * @throws \App\Exception\MailUPRecipientException
	 */
	public function addGroupMultipleSubscriber($groupId, $listId,DateTime $expireDate,array $recipients) {

		$srv = new Recipient();

		foreach ($recipients as $k => $recipient){
			$recipients[$k]['Email'] = trim($recipients[$k]['email']);
			$recipients[$k]['expireDate'] = $expireDate;
		}

		$srv->addMultipleRecipientsToLGroupByOwnerId(
			$this->ownerId,
			$groupId,$listId,
			$recipients);

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
