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
        $this->connector =  MailOneService::getInstance();

        $this->checkConfig();

        $response = array();
        switch ($this->action){
            case 'export':
                if(empty($this->user) || empty($this->userpassword)){
                    throw new \Exception("MailOne account not setted");
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
            case 'dump':
                $response = array();

                $argv = func_get_args();

                if(isset($argv[0])) {
                    if(intval($argv[0])>0){
                        $lists = array($argv[0]);
                    }
                    else{
                        $list = $this->connector->getAllContactLists($this->mailOneId);
                        $response = array();
                        if($list && isset($list['item'])){
                            foreach ($list['item'] as $value){
                                $lists[] = $value['listid'];

                            }
                        }
                    }
                    $response = array();
                    foreach ($lists as $valuelist) {

                        $list = $this->connector->getContactListSubscribers($valuelist, '');


                        if ($list && isset($list['count']) && $list['count'] > 0 && isset($list['subscriberlist'])) {
                            foreach ($list['subscriberlist']['item'] as $value) {

                                if ( isset($value['confirmed']) &&  isset($value['unsubscribed']) &&
                                    $value['unsubscribed'] == 0 && isset($value['emailaddress'])) {
                                    $response[$value['emailaddress']] = array(
                                        'id' => $value['subscriberid'],
                                        'email' => $value['emailaddress'],
                                        'list' => $valuelist,
                                    );
                                }
                            }
                        }

                    }
                }
                break;
            case 'subscriber':
                $response = array();

                $argv = func_get_args();

                if(isset($argv[0]) && intval($argv[0])>0 &&  intval($argv[1])>0) {
                    $resp = $this->connector->getSubscriber( intval($argv[0]),intval($argv[1]));
                    if($resp && is_array($resp) && isset($resp['subscriberid'])){
                        $objCustomForm = new MailOneCustomForm(intval($argv[1]),null);
                        $response = array(
                            'id' => $resp['subscriberid'],
                            'email' => $resp['emailaddress'],
                            'original_ip' =>  isset($resp['requestip'])?$resp['requestip']:''
                        );

                        if(isset($resp['CustomFields']) && isset($resp['CustomFields']['item'])){
                            foreach ($resp['CustomFields']['item'] as $field) {
                                $response[$objCustomForm->getNormalizedName($field['fieldname'])] = $field['data'];
                            }
                        }

                    }
                }


                break;
            case 'subscriberlist':
                $response = array();

                $argv = func_get_args();

                if(isset($argv[0]) && intval($argv[0])>0) {


                    $list = $this->connector->getContactListSubscribers(intval($argv[0]),'');


                    if ($list && isset($list['count']) && $list['count']>0 && isset($list['subscriberlist'])) {
                        foreach ($list['subscriberlist']['item'] as $value) {
                            if($value['unsubscribed']==0){
                                $response[] = array(
                                    'id' => $value['subscriberid'],
                                    'email' => $value['emailaddress']
                                );
                            }
                        }
                    }
                }
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

        if(!$this->em){
            $db = $this->container->get('em-config');
        }
        else{
            $db = $this->em;
        }

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
            throw new \Exception("MailOne account not configured !!!");
        }
    }
}
