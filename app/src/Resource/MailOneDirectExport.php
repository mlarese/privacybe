<?php
namespace App\Resource;


use App\Entity\Config\OwnerRepository;

use App\Helpers\MailOneCustomForm;
use App\Service\MailOneService;
use Doctrine\ORM\EntityManager;

class MailOneDirectExport  implements IDirectExport
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
        $this->connector =  MailOneService::getInstance();

        $this->checkConfig();

        $response = array();
        switch ($this->action){
            case 'export':
                if(empty($this->user) || empty($this->userpassword)){
                    throw new \Exception("MailOne account not configured");
                }



                $list = $this->connector->createContactList($this->user, $this->userpassword, $this->ownername , $this->name, $this->owneremail, $this->ownerreplayemail);
                if($list===false) throw new \Exception("MailOne account not configured");

                $list = intval($list);
                if($list>0){

                     $responsecf = $this->connector->getCustomFields($list);
                     $objCustomForm = new MailOneCustomForm($list,$responsecf);


                     foreach ($this->data as $value){

                         if(isset($value['name']) &&  $value['name']!=''){

                             $objCustomForm->setFieldValue('name', $value['name']);
                         }
                         if(isset($value['surname']) &&  $value['surname']!=''){

                             $objCustomForm->setFieldValue('surname', $value['surname']);
                         }
                         if(isset($value['language']) &&  $value['language']!=''){

                              $objCustomForm->setFieldValue('language', $value['language']);
                         }

                        $res = $this->connector->addSubscriber($list,$value['email'],1,'html',$objCustomForm->getCustomFields());

                    }
                }

                $response = array(
                    'id' => $list
                );


                break;
            case 'list':
                    $list = $this->connector->getAllContactLists($this->mailOneId);
                    $response = array();
                    if($list && isset($list['item'])){
                        foreach ($list['item'] as $value){
                            $response[] = array(
                                    'id' => $value['listid'],
                                    'name' => $value['name'],
                            );
                        }
                    }

                break;
            default:
        }

        return $response;
    }

    private function checkConfig(){
        /**
         * @var $db EntityManager
         */

        $db = $this->container->get('em-config');

        $this->mailOneId = false;


        $configs = $db->getRepository(OwnerRepository::class)->findBy(array('code' =>'EXTMODULE','ownerId' => $this->owner));

        if($configs && isset($configs[0])){
            /**
             * @var $configs OwnerRepository
             */
            $configs = $configs[0];
            $configAndMapping = $configs->getData();

            if($configAndMapping && is_array($configAndMapping)){

                foreach ($configAndMapping as $config){

                    if($config['type'] == 'MailOne'){
                            if(isset($config['apiaccount'])){

                                if( isset($config['apiaccount']['url'])){
                                    $this->connector->setUrlEntryPoint($config['apiaccount']['url']);

                                }
                                if( isset($config['apiaccount']['xmluser'])){
                                    $this->connector->setXmlUser($config['apiaccount']['xmluser']);
                                }
                                if( isset($config['apiaccount']['xmltoken'])){
                                    $this->connector->setXmlToken($config['apiaccount']['xmltoken']);
                                }
                            }
                        if(isset($config['user'])){

                            if( isset($config['user']['name'])){
                                $this->user =$config['user']['name'];

                            }
                            if( isset($config['user']['password'])){
                                $this->userpassword =$config['user']['password'];
                            }
                            if( isset($config['user']['fullname'])){
                                $this->ownername =$config['user']['fullname'];
                            }
                            if( isset($config['user']['email'])){
                                $this->owneremail =$config['user']['email'];
                            }
                            if( isset($config['user']['replyemail'])){
                                $this->ownerreplayemail =$config['user']['replyemail'];
                            }

                        }
                        if(isset($config['id'])){
                            $this->mailOneId = $config['id'];
                        }


                        break;
                    }

                }
            }
        }
        if(!$this->mailOneId || $this->mailOneId<=0){
            throw new \Exception("MailOne account not configured");
        }
    }
}
