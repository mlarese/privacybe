<?php
namespace App\Resource;


use App\Entity\Config\OwnerRepository;

use App\Entity\Privacy\MailUpListTTL;
use App\Helpers\DynDb;
use App\Helpers\MailOneCustomForm;
use App\Service\MailOneService;
use App\Service\MailUpService;
use Composer\Config;
use Doctrine\DBAL\Configuration;
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
     * @var MailUpService|null
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
        $today = date("j");    $thisMonth = date("n");    $thisYear = date("Y");
        $expireDate = date("F j Y", mktime(0,0,0, $thisMonth, $today, $thisYear+10));


        switch ($this->action){
            case 'export':
                $list = $this->connector->listExist($this->name);
                if(!isset($list)){
                    throw new \Exception("List alredy exist");
                }

                /** @var MailUpListTTL $list */
                $list = $this->connector->createContactList($this->name, $this->mailUpConfig);
                $confirmed = 1;

                foreach ($this->data as $value){
                    $optionalFields = [];
                    if(isset($value['language']) &&  $value['language']!=''){
                        $optionalFields = ['language' =>   $value['language'] ];
                    }

                    $this->connector->addSubscriber(
                        $list->getId(),
                        $value['email'],
                        $confirmed,
                        $value['name'] ,
                        $value['surname'],
                        $optionalFields,
                        $expireDate
                    );
                }

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

    /** @var Configuration */
    private $mailUpConfig;
    private function checkConfig(){

        $settings=$this->container->get('settings');
        $this->em = DynDb::get($this->container->get('dyn-privacy-db'),$this->owner,$settings, $settings['applicationContext']);



         $this->connector->setOwnerId($this->owner);

        /** @var find Configuration record $list */
        $this->mailUpConfig = $this->em->find(Configuration::class,'mailup');

    }
}
