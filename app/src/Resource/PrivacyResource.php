<?php

namespace App\Resource;


use App\Action\Terms;
use App\Base\BaseResource;
use App\Entity\Privacy\ActionHistory;
use App\Entity\Privacy\Privacy;
use App\Entity\Privacy\PrivacyAttachment;
use App\Entity\Privacy\PrivacyHistory;
use App\Resource\Privacy\GeneralDataIntegrator;
use App\Resource\Privacy\GroupByEmail;
use App\Resource\Privacy\GroupByEmailTerm;
use App\Resource\Privacy\GroupByEmailTermMultiple;
use App\Resource\Privacy\LanguageIntegrator;
use App\Resource\Privacy\PostFilter;
use App\Resource\Privacy\PrivacyRecordIntegrator;
use App\Resource\Privacy\TermIntegrator;
use App\Resource\Privacy\TreatmentsIntegrator;
use App\Service\DeferredPrivacyService;
use App\Service\FilesService;
use function date;
use DateTime;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\Query;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\QueryBuilder;
use Exception;
use function file_exists;
use const FTP_BINARY;
use function ftp_get;
use function ftp_login;
use function ftp_pasv;
use function get_object_vars;

use function json_decode;
use function json_encode;
use function md5;
use function mkdir;
use function pathinfo;
use function print_r;
use Slim\Container;
use function strtolower;
use function strtotime;
use function var_dump;

class PrivacyResource extends AbstractResource
{
    /** @var Container $container  */
    private $container = null;
    private $ownerId = null;

    /**
     * @return null
     */
    public function getOwnerId() {
        return $this->ownerId;
    }

    /**
     * @param null $ownerId
     *
     * @return PrivacyResource
     */
    public function setOwnerId($ownerId) {
        $this->ownerId = $ownerId;
        return $this;
    }
    /**
     * @param $privacyId
     *
     * @return null|object
     * @throws PrivacyNotFoundException
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function getPrivacy($privacyId){
        $prRec =  $this->entityManager->find(Privacy::class, $privacyId);

        if(!isset($prRec)) {
            throw new PrivacyNotFoundException('Privacy not found');
        }

        return $prRec;
    }

    /**
     * @return null
     */
    public function getContainer() {
        return $this->container;
    }

    public function hasContainer() {
        return isset($this->container);
    }

    /**
     * @param null $container
     *
     * @return PrivacyResource
     */
    public function setContainer($container) {
        $this->container = $container;
        return $this;
    }

    /**
     * @param $email
     *
     * @return Privacy
     */
    public function getLastPrivacyByEmail ($email) {
        $integrator = new GeneralDataIntegrator();
        $r = $this->getRepository();
        /** @var Privacy $record */
        $record = $r->findOneBy(["email" => $email, "deleted"=>0],["created"=>"desc"]);

        $arecord = $record->toArray();
        $integrator->integrate($arecord);

        $record = BaseResource::hydrateByArray($arecord, Privacy::class);

        return $record;

    }


    /**
     * @param $email
     * @throws OptimisticLockException
     */
    public function deletePrivacyByEmail ($email) {

            $r = $this->getRepository();
            $records = $r->findBy(["email" => $email]);
            /** @var Privacy $record */
            foreach ($records as $record) {
                $id = $record->getId();
                $this->entityManager->remove($record);

                $logs = $r->findBy(["privacyId" => $id]);

                /** @var PrivacyHistory $log */
                foreach ($logs as $log) {
                    $this->entityManager->remove($log);
                }

            }
            $this->entityManager->flush();

    }

    public function getRepository(){
        return $this->entityManager->getRepository(Privacy::class);
    }
    public function searchPrivacy(){
        $repo = $this->getRepository();

        $qb = $repo->createQueryBuilder('p');
        $qb
            ->select(['uid','created','email','name','ref','surname','domain', 'term_id','site','ip','telephone'])
            ->where('deleted=0')
            ->andWhere($qb->expr()->not('p.email IS NULL'))
            ->andWhere('not p.email IS NULL')
            ->andWhere("not p.email = ''")
        ;
        $results = $qb->getQuery()->getResult();
    }
    /**
     * @param      $privacyId
     * @param      $jsonPrivacy
     * @param      $type
     * @param null $description
     *
     * @return PrivacyHistory
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function savePrivacyLog($privacyId, $jsonPrivacy, $type, $description=null, $flush=true)
    {
        if(!isset($description)) {
            $description = 'privacy '. $type;
        }

       $ph = new PrivacyHistory();
       $ph
           ->setCreated(new \DateTime())
           ->setDescription($description)
           ->setPrivacyId($privacyId)
           ->setType($type)
           ->setPrivacy($jsonPrivacy)
       ;

       $this->entityManager->persist($ph);

       if($flush)
        $this->entityManager->flush();

       return $ph;
    }



    /**
     * @param $ip
     * @param $form
     * @param $cryptedForm
     * @param $name
     * @param $surname
     * @param $termId
     * @param $site
     * @param $privacy
     * @param $id
     * @param $ref
     * @param $domain
     * @param $email
     * @param $privacyFlags
     * @param $telephone
     * @param $raiseException
     * @param $deferred
     * @return Privacy
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function  savePrivacy(
        $ip,
        $form,
        $cryptedForm,
        $name,
        $surname,
        $termId,
        $site,
        $privacy,
        $id,
        $ref,
        $domain,
        $email,
        $privacyFlags,
        $telephone,
        $language=null,
        $page=null,
        $raiseException = false,
        $deferred = DeferredPrivacyService::DEFERRED_TYPE_NO,
        $version=null,
        $status=null,
        $note=null
    ) {
        $privacyEntry = new Privacy();
        $privacyEntry
            ->setCreated(new \DateTime())
            ->setDeleted(false)
            ->setIp($ip)
            ->setForm($form)
            ->setCryptedForm($cryptedForm)
            ->setName($name)
            ->setSurname($surname)
            ->setTermId($termId)
            ->setSite($site)
            ->setPrivacy($privacy)
            ->setId($id)
            ->setRef($ref)
            ->setDomain($domain)
            ->setEmail($email)
            ->setPrivacyFlags($privacyFlags)
            ->setTelephone($telephone);

        if(isset($note)) $privacyEntry->setNote($note);
        if(isset($language)) $privacyEntry->setLanguage($language);
        if(isset($page)) $privacyEntry->setPage($page);
        if($status!==null) $privacyEntry->setStatus($status);

        if($version!==null) $privacyEntry->setVersion($version);
        if($privacyEntry->getVersion()=== null) {
            $privacyEntry->setVersion(0);
        }
        if (!$this->entityManager->isOpen()) {
            $this->getRepository();
        }

        $prProperties = null;

        $isDeferred = ($deferred !== DeferredPrivacyService::DEFERRED_TYPE_NO);
        $hasAttachments = false;
        $privacyDef = null;
        $privacyAttachment = null;
        // controllo se esiste allegato: se esiste la procedura double-optin non è necessaria
        if($isDeferred) {
            if(isset($form) && isset($form['MMattachedfiles']) ) {
                $fservice = new FilesService($this->getContainer());
                $container = $this->getContainer();
                $settings = $container->get('settings');
                $userAtt = $settings['attachments']['users'];

                $ftp_server = $userAtt["ftp_server"];
                $ftp_user_name = $userAtt["ftp_user_name"];
                $ftp_user_pass = $userAtt["ftp_user_pass"];

                $ftpConnId = ftp_connect ($ftp_server);
                $login_result = ftp_login($ftpConnId, $ftp_user_name, $ftp_user_pass);
                ftp_pasv ( $ftpConnId , true ) ;

                $hasAttachments = true;
                $isDeferred = false;
                $attachs = json_decode( $form['MMattachedfiles'], true );

                $privacyAttachment = new PrivacyAttachment();
                $privacyAttachment->setId($id)
                    ->setCreated(new DateTime())
                    ->setDeleted(false);

                $count = 1;
                $attachments = [];
                $hasAttachments=true;
                $prProperties = ['attachments_download'=> []];

                foreach ($attachs as $key=>$att) {
                    $ftpFileName = $att['token'];
                    $structureId = $att['path'];
                    $inst = $att['inst'];

                    $path_parts = pathinfo($ftpFileName);
                    $ext=$path_parts['extension'];
                    $oFileName = "Double optin attachment $count.".$ext;

                    $fileName = md5($oFileName) ;

                    $ftpFileName_Path = "/TMPGDPR/$inst/$structureId/$ftpFileName";
                    $localFileName = $fservice->buildPrivacyAttachmentFileName($ftpFileName_Path, $this->getOwnerId(), $id);
                    if(!file_exists($localFileName)) mkdir($localFileName,0777,true);
                    $localFileName.='/'.$fileName;

                    //die($localFileName);

                    // die($ftpFileName_Path);

                    $prProperties['attachments_download'] ['file_name']  =  $oFileName;
                    $prProperties['attachments_download'] ['success']  =  false;

                    try {
                        if (ftp_get($ftpConnId, $localFileName, $ftpFileName_Path, FTP_BINARY)) {
                            $attachments[] = [
                                "created" => new DateTime(),
                                "fileName" => $oFileName,
                                "description" => "Double optin attachment"
                            ];

                            $prProperties['attachments_download'] ['success']=true;

                        } else {
                            // echo "error";
                            // throw new Exception('File '. $oFileName . ' not saved ');
                        }
                    }catch(Exception $e) {

                    }

                    $count++;
                }


                ftp_close($ftpConnId);
                $privacyAttachment->setAttachments(  json_encode( $this->toJson($attachments)  ));
                // print_r($privacyAttachment);die;
            }
        }

        if($isDeferred) {
            $deferredTYpe = $deferred;
            $defSrv = new DeferredPrivacyService();
            $privacyDef = $defSrv->setDeferred($privacyEntry, $deferredTYpe);

            $acHistory = new ActionHistory();
            $acHistory->setType('deferred-created')
                ->setUserName( $email )
                ->setDescription("deffered created $email  uid=$id")
                ->setDate(new DateTime())
            ;
            $this->entityManager->merge($acHistory);
            $this->entityManager->flush();
        }



        if($raiseException)
        {
            if($this->entityManager->isOpen())
            {
                try {
                    if(isset($prProperties))
                        $privacyEntry->setProperties( json_encode($prProperties) );
                    $this->entityManager->merge($privacyEntry);
                    if($isDeferred) {
                        $this->entityManager->merge($privacyDef);
                    }
                    if($hasAttachments) {
                        if(isset($privacyAttachment)) {
                            $this->entityManager->merge($privacyAttachment);
                        }
                    }

                    $this->entityManager->flush();
                } catch (Exception $e) {
                    echo $e;
                    if($raiseException)
                    {

                        $acHistory = new ActionHistory();
                        $acHistory->setType('deferred-created-error')
                            ->setUserName( $email )
                            ->setDescription("error creating deffered  $email  uid=$id ")
                            ->setDate(new DateTime())
                        ;
                        $this->entityManager->merge($acHistory);
                        $this->entityManager->flush();

                        $msg = '**Data not imported: email '.$privacyEntry->getEmail().(($privacyEntry->getName() != '' && $privacyEntry->getSurname() != '') ? ', user '.$privacyEntry->getName().' '.$privacyEntry->getSurname() : '').' **';
                        Throw new Exception($msg);
                    }
                }



                return $privacyEntry;
            }

            return false;
        }
        else
        {
            try {
                if(isset($prProperties))
                    $privacyEntry->setProperties( json_encode($prProperties) );
                $this->entityManager->merge($privacyEntry);
                if($isDeferred) {
                    $this->entityManager->merge($privacyDef);
                }

                if($hasAttachments) {
                    if(isset($privacyAttachment)) {
                        $this->entityManager->merge($privacyAttachment);
                    }
                }
                $this->entityManager->flush();
            } catch (Exception $e) {
                echo $e;
            }


            return $privacyEntry;
        }

    }

    private function downloadPrivacyDblOptinAttachments($privacyEntry, $mMattachedfiles) {
        $newAttachment = new PrivacyAttachment();

        // $fileService = new FilesService()

    }

    public function EMClear()
    {
        $this->entityManager->clear();
    }

    /**
     * @param $id
     * @param $form
     * @param $cryptedForm
     * @param $name
     * @param $surname
     * @param $privacy
     * @param $email
     * @param $privacyFlags
     * @param $telephone
     * @return Privacy
     * @throws PrivacyNotFoundException
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function updatePrivacy(
        $id,
        $form,
        $cryptedForm,
        $name,
        $surname,
        $privacy,
        $email,
        $privacyFlags,
        $telephone)
    {
        /** @var Privacy $privacyEntry */
        $privacyEntry = $this->entityManager->find(Privacy::class, $id);
        if(!isset($privacyEntry)) {
            throw new PrivacyNotFoundException('Privacy not found');
        }

        $privacyEntry
            ->setDeleted(false)
            ->setForm($form)
            ->setCryptedForm($cryptedForm)
            ->setName($name)
            ->setSurname($surname)
            ->setPrivacy($privacy)
            ->setEmail($email)
            ->setPrivacyFlags($privacyFlags)
            ->setTelephone($telephone);

        $this->entityManager->merge($privacyEntry);
        $this->entityManager->flush();

        return $privacyEntry;
    }

    const EMAIL_DESTRUCT_REG  = '/@((([^.]+)\.)+)([a-zA-Z]{3,}|[a-zA-Z.]{5,})/';
    private function emailDomainType($email) {
        $aEmail = explode('.',$email);
        return strtolower( $aEmail[count($aEmail)-1]);
    }

    /**
     * @param null                $criteria
     * @param IResultGrouper|null $grouper
     * @param IFilter|null        $filter
     *
     * @return array|mixed
     * @throws \Doctrine\ORM\ORMException
     */
    public function privacyListIds($criteria=null, IResultGrouper $grouper = null, IFilter $filter=null) {

        if($grouper==null) $grouper = GroupByEmail();
        $repo = $this->getRepository();
        $termRes = new TermResource($this->entityManager);
        $termPageRes = new TermPageResource($this->entityManager);

        $termMap = $termRes->map();
        $termPageMap = $termPageRes->map();

        if(!isset($filter)) {
            if(isset($criteria['postFilter'])) {
                if($criteria['postFilter']) $filter = new PostFilter();
            } else {
                $filter = new PostFilter();
            }

        }

        $ex = $this->entityManager->getExpressionBuilder();
        $results = [];

        $fields = [
            'p.email',
            'p.privacyFlags',
            'p.termId',
            'p.name',
            'p.surname',
            'p.id',
            'p.created',
            'p.language'
        ];

        $this->entityManager->getConfiguration()->addCustomDatetimeFunction('DATE', 'DateFunction');

        $qb = $repo->createQueryBuilder('p');
        /** @var Query\Expr $ex */
        $ex = $qb->expr();

        $siteConditions = array("p.site = '/'","p.site LIKE '%step%'", "p.site LIKE '%crobackend%'"  , "p.site LIKE '%newsletter%'" , "p.site LIKE '%enquiry%'", "p.site LIKE '%booking%'" );
        $orXSiteConditions = $ex->orX();
        $orXSiteConditions->addMultiple($siteConditions);


        $qb
            ->select($fields)
            ->where('p.deleted=0')
            ->andWhere( $ex->not("p.email=''") )
            ->andWhere( $ex->not("p.email IS NULL") )
            ->andWhere( $orXSiteConditions )

            // ->setParameter('site', '%step%')
            //->andWhere( $ex->not("p.ref=''") )
            //->andWhere( $ex->not("p.ref IS NULL") )
            //->setMaxResults(10)
        ;


        $qb ->addOrderBy( 'p.email', 'ASC')
            ->addOrderBy( 'p.termId', 'ASC')
            ->addOrderBy( 'p.created', 'DESC')
            ->addOrderBy( 'p.domain', 'ASC')
            ->addOrderBy( 'p.site', 'ASC')
        ;

        if($criteria === null) {
            $qb ->addOrderBy( 'p.email', 'ASC')
                ->addOrderBy( 'p.termId', 'ASC')
                ->addOrderBy( 'p.created', 'DESC')
                ->addOrderBy( 'p.domain', 'ASC')
                ->addOrderBy( 'p.site', 'ASC')
            ;
        } else {

            $person = null ;
            $sort = 'default' ;
            $sortDirection = 'ASC';

            if(isset($criteria['domain']) && $criteria['domain']!=='' && $criteria['domain']!=='all' ) {
                $crDomain = $criteria['domain'];
                $qb->andWhere( "p.domain=:domain")
                    ->setParameter('domain',$crDomain)
                ;
            }

            $qb ->addOrderBy( 'p.email', $sortDirection)
                ->addOrderBy( 'p.termId', 'ASC')
                ->addOrderBy( 'p.created', 'DESC')
                ->addOrderBy( 'p.domain', 'ASC')
                ->addOrderBy( 'p.site', 'ASC')
            ;


        }

        $sql =  $qb->getQuery()->getSQL();

        // die($sql);
        $rsm = new ResultSetMapping();
            $rsm->addScalarResult('email_0', 'email');
            $rsm->addScalarResult('privacy_flags_1', 'privacyFlags', 'json');
            $rsm->addScalarResult('term_id_2', 'termId', 'string');
            $rsm->addScalarResult('name_3', 'name', 'string');
            $rsm->addScalarResult('surname_4', 'surname', 'string');
            $rsm->addScalarResult('id_5', 'id', 'string');
            $rsm->addScalarResult('created_6', 'created', 'datetime');
            $rsm->addScalarResult('language_7', 'language', 'string');

            $query = $this->getEntityManager()->createNativeQuery($sql, $rsm);
            $results = $query->getResult();

        // $privacyRecordIntegrator = new PrivacyRecordIntegrator($termPageMap, $termMap);
        // foreach ($results as &$pr) {
            // $privacyRecordIntegrator->integrate($pr);
        // }


        // print_r($results);  die;

        if($filter)  $results = $filter->filter($results,$criteria);
        if($grouper)  $results = $grouper->group($results,$criteria);

        return $results;
    }

    /**
     * @param null                $criteria
     * @param IResultGrouper|null $grouper
     * @param IFilter|null        $filter
     *
     * @return array|mixed
     * @throws \Doctrine\ORM\ORMException
     */
    public function privacyListFw($criteria=null, IResultGrouper $grouper = null, IFilter $filter=null) {
        $repo = $this->getRepository();
        $termRes = new TermResource($this->entityManager);
        $termPageRes = new TermPageResource($this->entityManager);

        $termMap = $termRes->map();
        $termPageMap = $termPageRes->map();

        if(!isset($filter)) {
            if(isset($criteria['postFilter'])) {
                if($criteria['postFilter']) $filter = new PostFilter();
            } else {
                $filter = new PostFilter();
            }

        }

        if(isset($criteria)) {
            if(isset($criteria['_result_'])) {
                // print_r($criteria['_result_']);
                return $criteria['_result_'];
            }
        }

        $ex = $this->entityManager->getExpressionBuilder();
        $results = [];

        $fields = [
            'p.name',
            'p.surname',
            'p.id',
            'p.ip',
            'p.created',
            'p.domain',
            'p.site',
            'p.note',
            'p.termId',
            'p.privacy',
            'p.form',
            'p.privacyFlags',
            'p.email'
        ];

        $this->entityManager->getConfiguration()->addCustomDatetimeFunction('DATE', 'DateFunction');

        $qb = $repo->createQueryBuilder('p');
        $ex = $qb->expr();
        $qb
            ->select($fields)
            ->where('p.deleted=0')
            // ->setMaxResults(30)
            ->andWhere( $ex->not("p.email=''") )
            ->andWhere( $ex->not("p.email IS NULL") )
        ;


        $qb ->addOrderBy( 'p.email', 'ASC')
            ->addOrderBy( 'p.termId', 'ASC')
            ->addOrderBy( 'p.created', 'DESC')
            ->addOrderBy( 'p.domain', 'ASC')
            ->addOrderBy( 'p.site', 'ASC')
        ;

        if($criteria === null) {
            $qb ->addOrderBy( 'p.email', 'ASC')
                ->addOrderBy( 'p.termId', 'ASC')
                ->addOrderBy( 'p.created', 'DESC')
                ->addOrderBy( 'p.domain', 'ASC')
                ->addOrderBy( 'p.site', 'ASC')
            ;
        } else {

            $person = null ;
            $sort = 'default' ;
            $sortDirection = 'ASC';


            if(isset($criteria['person']) && $criteria['person']!=='') {
                $person = $criteria['person'] ;
                $person="%${person}%";
                $persCond = [ "p.email LIKE :person ", "p.name LIKE :person ",  "p.surname LIKE :person "  ];

                $qb
                    ->andWhere( $ex->orX()->addMultiple($persCond))
                    ->setParameter('person',$person);
                ;
            }

            if(isset($criteria['created']) && $criteria['created']!=='') {
                $created = $criteria['created'] ;
                $dt = date($created);
                $ndt = date('Y-m-d', strtotime($dt. ' + 1 days'));


                $qb->andWhere( "p.created BETWEEN :firstdate AND :secondDate")
                    ->setParameter('firstdate',$dt)
                    ->setParameter('secondDate',$ndt)
                ;

            }

            if(isset($criteria['domain']) && $criteria['domain']!=='' && $criteria['domain']!=='all' ) {
                $crDomain = $criteria['domain'];
                $qb->andWhere( "p.domain=:domain")
                    ->setParameter('domain',$crDomain)
                ;
            }

            $qb ->addOrderBy( 'p.email', $sortDirection)
                ->addOrderBy( 'p.termId', 'ASC')
                ->addOrderBy( 'p.created', 'DESC')
                ->addOrderBy( 'p.domain', 'ASC')
                ->addOrderBy( 'p.site', 'ASC')
            ;


        }

        $results = $qb->getQuery()->getResult();


        $privacyRecordIntegrator = new PrivacyRecordIntegrator($termPageMap, $termMap);

        // guest[reservation_guest_language]":"en"

        foreach ($results as &$pr) {
            $privacyRecordIntegrator->integrate($pr);
            unset($pr['privacy']);
            unset($pr['form']);
        }

        if($filter)  $results = $filter->filter($results,$criteria);
        if($grouper)  $results = $grouper->group($results,$criteria);

        return $results;
    }

    /**
     * @param null                $criteria
     * @param IResultGrouper|null $grouper
     * @param IFilter|null        $filter
     *
     * @return array|mixed
     * @throws \Doctrine\ORM\ORMException
     */
    public function privacyListLight($criteria=null, IResultGrouper $grouper = null, IFilter $filter=null) {
        $repo = $this->getRepository();
        $termRes = new TermResource($this->entityManager);
        $termPageRes = new TermPageResource($this->entityManager);

        $termMap = $termRes->map();
        $termPageMap = $termPageRes->map();

        if(!isset($filter)) {
            $filter = new PostFilter();
        }

        $ex = $this->entityManager->getExpressionBuilder();
        $results = [];

        $fields = [
            'p.id'
            // 'p.name',
            // 'p.surname',
            // 'p.ip',
            // 'p.created',
            // 'p.domain',
            // 'p.site',
            // 'p.termId',
            // 'p.email'
        ];

        $this->entityManager->getConfiguration()->addCustomDatetimeFunction('DATE', 'DateFunction');

        $qb = $repo->createQueryBuilder('p');
        $ex = $qb->expr();
        $qb
            ->select($fields)
            ->where('p.deleted=0')
            ->andWhere( $ex->not("p.email=''") )
            ->andWhere( $ex->not("p.email IS NULL") )
        ;


        $qb ->addOrderBy( 'p.email', 'ASC')
            ->addOrderBy( 'p.termId', 'ASC')
            ->addOrderBy( 'p.created', 'DESC')
            ->addOrderBy( 'p.domain', 'ASC')
            ->addOrderBy( 'p.site', 'ASC')
        ;

        if($criteria === null) {
            $qb ->addOrderBy( 'p.email', 'ASC')
                ->addOrderBy( 'p.termId', 'ASC')
                ->addOrderBy( 'p.created', 'DESC')
                ->addOrderBy( 'p.domain', 'ASC')
                ->addOrderBy( 'p.site', 'ASC')
            ;
        } else {

            $person = null ;
            $sort = 'default' ;
            $sortDirection = 'ASC';


            if(isset($criteria['person']) && $criteria['person']!=='') {
                $person = $criteria['person'] ;
                $person="%${person}%";
                $persCond = [ "p.email LIKE :person ", "p.name LIKE :person ",  "p.surname LIKE :person "  ];

                $qb
                    ->andWhere( $ex->orX()->addMultiple($persCond))
                    ->setParameter('person',$person);
                ;
            }


            if(isset($criteria['created']) && $criteria['created']!=='') {
                $created = $criteria['created'] ;
                $dt = date($created);
                $ndt = date('Y-m-d', strtotime($dt. ' + 1 days'));


                $qb->andWhere( "p.created BETWEEN :firstdate AND :secondDate")
                    ->setParameter('firstdate',$dt)
                    ->setParameter('secondDate',$ndt)
                ;

            }

            if(isset($criteria['domain']) && $criteria['domain']!=='' && $criteria['domain']!=='all' ) {
                $crDomain = $criteria['domain'];
                $qb->andWhere( "p.domain=:domain")
                    ->setParameter('domain',$crDomain)
                ;
            }

            $qb ->addOrderBy( 'p.email', $sortDirection)
                ->addOrderBy( 'p.termId', 'ASC')
                ->addOrderBy( 'p.created', 'DESC')
                ->addOrderBy( 'p.domain', 'ASC')
                ->addOrderBy( 'p.site', 'ASC')
            ;


        }


        // $old = memory_get_usage();

        $results = $qb->getQuery()->getResult();

        // $mem = memory_get_usage();
        // $size = abs($mem - $old);
        // echo $size; die(1);

        $privacyRecordIntegrator = new PrivacyRecordIntegrator($termPageMap, $termMap);

        foreach ($results as &$pr) {
            $this->privacyListLightIntegrateJsonFields($pr);
            $privacyRecordIntegrator->integrate($pr);
            unset($pr['privacy']);
            unset($pr['form']);
        }

        if($filter)  $results = $filter->filter($results,$criteria);
        if($grouper)  $results = $grouper->group($results,$criteria);

        //print_r($results); die('end');

        return $results;
    }


    /**
     * @param $record
     *
     * @return mixed
     * @throws OptimisticLockException
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    private function privacyListLightIntegrateJsonFields (&$record) {
        $id = $record['id'];

        /** @var Privacy $privacy */
        $privacy = $this->entityManager->find(Privacy::class, $id);

        $record['privacy'] = $privacy->getPrivacy();
        $record['form'] = $privacy->getForm();
        $record['privacyFlags'] = $privacy->getPrivacyFlags();

        $record['name'] = $privacy->getName();
        $record['surname'] = $privacy->getSurname();
        $record['ip'] = $privacy->getIp();
        $record['created'] = $privacy->getCreated();
        $record['domain'] = $privacy->getDomain();
        $record['site'] = $privacy->getSite();
        $record['termId'] = $privacy->getTermId();
        $record['email'] = $privacy->getEmail();

        $this->entityManager->detach($privacy);
        $privacy = null;

        return $record;
    }

    /**
     * @param null                $criteria
     * @param IResultGrouper|null $grouper
     * @param IFilter|null        $filter
     *
     * @return array|mixed
     * @throws \Doctrine\ORM\ORMException
     */
    public function privacyList($criteria=null, IResultGrouper $grouper = null, IFilter $filter=null) {
         return $this->privacyListFw($criteria,  $grouper, $filter);
    }

    public function updateFlags($flags, $term, $id) {

        /** @var Privacy $pr */
        $pr = $this->getEntityManager()->find(Privacy::class, $id);

        $pr->setPrivacy($term)
            ->setPrivacyFlags($flags);

        $this->getEntityManager()->merge($pr);



    }

    public function privacyRecordGrouped($email, $domain = null) {
        $repo = $this->getRepository();
        $termRes = new TermResource($this->entityManager);
        $termPageRes = new TermPageResource($this->entityManager);

        $termMap = $termRes->map();
        $termPageMap = $termPageRes->map();

        $ex = $this->entityManager->getExpressionBuilder();
        $results = [];

        $fields = [
            'p.name',
            'p.surname',
            'p.id',
            'p.ip',
            'p.created',
            'p.telephone',
            'p.deleted',
            'p.ref',
            'p.domain',
            'p.note',
            'p.site',
            'p.termId',
            'p.privacy',
            'p.form',
            // 'p.cryptedForm',
            'p.privacyFlags',
            'p.properties',
            'p.email'
        ];

        $qb = $repo->createQueryBuilder('p');
        $ex = $qb->expr();
        $qb
            ->select($fields)
            ->where('p.deleted=0')
            ->andWhere( "p.email=:email")
            ->andWhere( $ex->not("p.ip='####'"));

        if(isset($domain)){
            $qb->andWhere('p.domain=:domain')
                ->setParameter('domain', $domain);
        }



        $qb
            ->setParameter('email', $email)
            ->addOrderBy( 'p.termId', 'ASC')
            ->addOrderBy( 'p.created', 'DESC')
            ->addOrderBy( 'p.domain', 'ASC')
            ->addOrderBy( 'p.site', 'ASC')
        ;


        $results = $qb->getQuery()->getResult();
        $privacyRecordIntegrator = new PrivacyRecordIntegrator($termPageMap, $termMap);

        // guest[reservation_guest_language]":"en"
        foreach ($results as &$pr) {
            $privacyRecordIntegrator->integrate($pr);
        }


        $groupByEmailTerm = new GroupByEmailTerm();
        $results=$groupByEmailTerm->group($results,null);

        if(isset($results[$email]))
            $results =$results[$email];
        else
            $result= [];

        // $ret =[];
        // foreach ($results as $term=>$privacy){
        //     $ret[]=['termId'=>$term, 'privacy'=>$privacy];
        // }
        return $results;
    }

    public function privacyRecord($email, $domain = null) {
        $repo = $this->getRepository();
        $termRes = new TermResource($this->entityManager);
        $termPageRes = new TermPageResource($this->entityManager);

        $termMap = $termRes->map();
        $termPageMap = $termPageRes->map();

        $ex = $this->entityManager->getExpressionBuilder();
        $results = [];

        $fields = [
            'p.name',
            'p.surname',
            'p.id',
            'p.ip',
            'p.created',
            'p.telephone',
            'p.deleted',
            'p.ref',
            'p.domain',
            'p.note',
            'p.site',
            'p.termId',
            'p.privacy',
            'p.form',
            // 'p.cryptedForm',
            'p.privacyFlags',
            'p.properties',
            'p.email'
        ];

        $qb = $repo->createQueryBuilder('p');
        $ex = $qb->expr();
        $qb
            ->select($fields)
            ->where('p.deleted=0')
            ->andWhere( "p.email=:email")
            ->andWhere( $ex->not("p.ip='####'"))
        ;

        if(isset($domain)){
            $qb->andWhere('p.domain=:domain')
                ->setParameter('domain', $domain);
        }


        $qb
            ->setParameter('email', $email)
                ->addOrderBy( 'p.termId', 'ASC')
                ->addOrderBy( 'p.created', 'DESC')
                ->addOrderBy( 'p.domain', 'ASC')
                ->addOrderBy( 'p.site', 'ASC')
            ;


        // die ($qb->getQuery()->getSQL());

        $results = $qb->getQuery()->getResult();
        $privacyRecordIntegrator = new PrivacyRecordIntegrator($termPageMap, $termMap);

        // guest[reservation_guest_language]":"en"
        foreach ($results as &$pr) {
            $privacyRecordIntegrator->integrate($pr);
        }


        $groupByEmailTerm = new GroupByEmailTermMultiple();
        $results=$groupByEmailTerm->group($results,null);

        if(isset($results[$email]))
            $results =$results[$email];
        else
            $result= [];

        // $ret =[];
        // foreach ($results as $term=>$privacy){
        //     $ret[]=['termId'=>$term, 'privacy'=>$privacy];
        // }
        return $results;
    }

    /**
     * @param $criteria
     * @return mixed
     */
    public function nativeSearchPrivacy ($criteria) {
        $absTermCode = Terms::ABS_DEFAULT_TERM_CODE;
        $sql = "
            SELECT privacy_entry.email,
               privacy_entry.domain,
               privacy_entry.site,
               CASE 
                  WHEN privacy_entry.term_id='0' THEN IFNULL(term_page.term_uid, $absTermCode)
                  ELSE privacy_entry.term_id
              END as pr_term_id 
               

              FROM privacy_entry 
              left join 
                term_page on 
                  term_page.domain = privacy_entry.domain and
                  term_page.page = privacy_entry.site
                
              where 
              privacy_entry.deleted = 0 
              AND (not email IS NULL AND NOT email = '')
              
              group by email
            ";
        $rsm = new ResultSetMapping();


        $rsm->addScalarResult('email', 'email');
        $rsm->addScalarResult('domain', 'domain');
        $rsm->addScalarResult('site', 'site');
        $rsm->addScalarResult('term_uid', 'term_uid');
        $rsm->addScalarResult('term_id', 'term_id');
        $rsm->addScalarResult('pr_term_id', 'pr_term_id');

        $qn = $this->entityManager->createNativeQuery($sql, $rsm);
        $users = $this->entityManager->getResult();

        return $users;
    }


    /**
     * @param $criteria
     * @return mixed
     */
    public function nativeExtractFlags ($criteria) {
        $sql = "
            SELECT privacy_entry.email,
               privacy_entry.domain,
               privacy_entry.site

              FROM privacy_entry 
                
              where 
              privacy_entry.deleted = 0 
              AND (not email IS NULL AND NOT email = '')
              limit 100
            ";
        $rsm = new ResultSetMapping();


        $rsm->addScalarResult('email', 'email');
        $rsm->addScalarResult('domain', 'domain');
        $rsm->addScalarResult('site', 'site');
        $rsm->addScalarResult('term_uid', 'term_uid');
        $rsm->addScalarResult('term_id', 'term_id');
        $rsm->addScalarResult('pr_term_id', 'pr_term_id');


        $qn = $this->entityManager->createNativeQuery($sql, $rsm);

        try {
            $users = $qn->getResult();
        } catch (Exception $e) {
            echo $e->getMessage();
            die('error');
        }


        return $users;
    }

}
