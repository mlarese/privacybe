<?php
namespace App\Resource;


use App\Entity\Config\OwnerRepository;

use App\Helpers\MailOneCustomForm;
use App\Service\MailOneService;
use App\Service\MailUpService;
use Doctrine\ORM\EntityManager;

class MailUpDirectExport  implements IDirectExport
{

    protected $name;
    protected $email;
    protected $noreplymail;
    protected $action;
    protected $data;
    protected $owner;
    protected $mailOneId;
    protected $container;
    protected $user;
    protected $userpassword;
    protected $ownername;
    protected $owneremail;
    protected $ownerreplayemail;
    protected $em;
    /**
     * @var MailOneService|null
     */
    protected $connector;

    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param mixed $owner
     */
    public function setOwner($owner): void
    {
        $this->owner = $owner;
    }


    public function __construct($container=null)
    {


        $this->container=$container;


    }


    public function setAction($action)
    {
        $this->action = $action;
    }

    public function setSource($data)
    {
        $this->data = $data;
    }

    public function setName($value)
    {
        $this->name=$value;

    }

    public function setReplyEmail($email)
    {
        $this->noreplymail=$email;
    }

    public function setEmail($email)
    {
        $this->email=$email;
    }

    public function export()
    {
        $this->connector =  MailUpService::getInstance();

        $this->checkConfig();

        $response = array();
        switch ($this->action){
            case 'export':

                break;
            case 'list':


                break;
            case 'dump':

                break;
            case 'subscriber':


                break;
            case 'subscriberlist':

                break;
            default:
        }

        return $response;
    }

    public function setEntityManager($value){
        $this->em = $value;
    }

    private function checkConfig(){
        /**
         * @var $db EntityManager
         */

         $db = $this->container->get('em-config');

         $this->connector->setOwnerId($this->owner);


    }
}
