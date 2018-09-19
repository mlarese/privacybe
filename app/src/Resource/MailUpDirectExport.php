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

                $mailUpConfig = $this->mailUpConfig[0]->getData();
                $mailUpConfig['expireDate'] = new \DateTime();

                if(isset($mailUpConfig['expireAfter']) && $mailUpConfig['expireAfter']!='' ){
                    $mailUpConfig['expireDate']->modify("+ " .  $mailUpConfig['expireAfter'] . " Days");
                }
                else{
                    $mailUpConfig['expireDate']->modify("+ 30 Days");
                }

                try{
                    $list = $this->connector->listExist($this->name);
                    if(!isset($list)){
                        throw new \Exception("List alredy exist");
                    }

                    /** @var MailUpListTTL $list */


                    $list = $this->connector->createContactList($this->name,$mailUpConfig);

                }
                catch (\Exception $e){

                    print_r($e->getMessage());
                    die;
                }


                try {

                        $this->connector->addMultipleSubscriber( $list->getId(),$mailUpConfig['expireDate'],$this->data);



                  }
                  catch (\Exception $e){

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

        try{
            $this->mailUpConfig = $this->em->getRepository(\App\Entity\Privacy\Configuration::class)->findBy(array('code' => 'mailup'));
        }
        catch(\Exception $e){
            print_r($e->getMessage());
            die;
        }


    }
}
