<?php

namespace App\Resource;


use App\Action\Terms;
use App\Entity\Privacy\Privacy;
use App\Entity\Privacy\PrivacyHistory;
use App\Resource\Privacy\GeneralDataIntegrator;
use App\Resource\Privacy\GroupByEmailTerm;
use App\Resource\Privacy\LanguageIntegrator;
use App\Resource\Privacy\PrivacyRecordIntegrator;
use App\Resource\Privacy\TermIntegrator;
use App\Resource\Privacy\TreatmentsIntegrator;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\Query\ResultSetMapping;
use Exception;
use http\Env\Response;
use function json_encode;
use function strtolower;

class PrivacyResource extends AbstractResource
{

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

/*
`uid` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
`created` datetime DEFAULT CURRENT_TIMESTAMP,
`email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
`name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
`ref` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
`surname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
`form` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
`crypted_form` longtext COLLATE utf8_unicode_ci,
`privacy` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json_array)',
`privacy_flags` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
`term_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
`domain` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
`site` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
`ip` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
`telephone` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
`deleted` tinyint(1) NOT NULL DEFAULT '0',*/

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
    public function savePrivacyLog($privacyId, $jsonPrivacy, $type, $description=null)
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
     * @return Privacy
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function savePrivacy(
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
        $telephone

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

        $this->entityManager->merge($privacyEntry);
        $this->entityManager->flush();

        return $privacyEntry;
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
     *
     * @return array
     */
    public function privacyListFw($criteria=null, IResultGrouper $grouper = null, IFilter $filter=null) {
        $repo = $this->getRepository();
        $termRes = new TermResource($this->entityManager);
        $termPageRes = new TermPageResource($this->entityManager);

        $termMap = $termRes->map();
        $termPageMap = $termPageRes->map();

        $validTreatments = [];
        if(isset($criteria)) {
            foreach ($criteria['treatments'] as $tr) {
                if($tr['selected']) {
                    foreach($tr['terms'] as $term ) {
                        if($term['selected']) {
                            $validTreatments [$tr['code']][$term['uid']] = true;
                        }
                    }

                }

            }
        }

        // print_r($validTreatments);die;
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
            'p.termId',
            'p.privacy',
            'p.form',
            'p.privacyFlags',
            'p.email'
        ];

        $qb = $repo->createQueryBuilder('p');
        $ex = $qb->expr();
        $qb
            ->select($fields)
            ->where('p.deleted=0')
            ->andWhere( $ex->not("p.email=''") )
            ->andWhere( $ex->not("p.email IS NULL") )
        ;

        if($criteria === null) {
            $qb ->addOrderBy( 'p.email', 'ASC')
                ->addOrderBy( 'p.termId', 'ASC')
                ->addOrderBy( 'p.created', 'DESC')
                ->addOrderBy( 'p.domain', 'ASC')
                ->addOrderBy( 'p.site', 'ASC')
            ;
        } else {

            $person = $criteria['person'] ;
            $sort = 'default' ;
            $sortDirection = 'ASC';

            if(isset($person) && $person!=='') {
                $person="%${person}%";
                $persCond = [ "p.email LIKE :person ", "p.name LIKE :person ",  "p.surname LIKE :person "  ];
                $qb
                    ->andWhere( $ex->orX()->addMultiple($persCond))
                    ->setParameter('person',$person);
                ;
            }

            $qb ->addOrderBy( 'p.email', $sortDirection)
                ->addOrderBy( 'p.termId', 'ASC')
                ->addOrderBy( 'p.created', 'DESC')
                ->addOrderBy( 'p.domain', 'ASC')
                ->addOrderBy( 'p.site', 'ASC')
            ;

        }

        $searchResult = $qb->getQuery()->getResult();
        $privacyRecordIntegrator = new PrivacyRecordIntegrator($termPageMap, $termMap);

        // guest[reservation_guest_language]":"en"
        $results = [];

        foreach ($searchResult as &$pr) {

            $privacyRecordIntegrator->integrate($pr);
            unset($pr['privacy']);
            unset($pr['form']);

            $includeRec = false;

            foreach ($pr['privacyFlags'] as $f) {

                if( isset($validTreatments[ $f['code'] ] [$pr['termId']])  ) {
                    $includeRec = true;
                    // echo $f['code'] . ' # ' . $pr['termId'] . ' - ' . $pr['email'];
                    break;
                }
            }

            if($includeRec) $results[] = $pr;
            //print_r($pr);
            //die;
        }

        if($grouper)  $results = $grouper->group($results,$criteria);
        if($filter)  $results = $filter->filter($results,$criteria);

        return $results;
    }

    /**
     * It is a alias for privacyListFw
     * @param null $criteria
     *
     * @return array
     */
    public function privacyList($criteria=null, IResultGrouper $grouper = null, IFilter $filter=null) {
         return $this->privacyListFw($criteria,  $grouper, $filter);
    }


    public function privacyRecord($email) {
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
            'p.site',
            'p.termId',
            'p.privacy',
            'p.form',
            // 'p.cryptedForm',
            'p.privacyFlags',
            'p.email'
        ];

        $qb = $repo->createQueryBuilder('p');
        $ex = $qb->expr();
        $qb
            ->select($fields)
            ->where('p.deleted=0')
            ->andWhere( "p.email=:email")
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
        $results =$results[$email];

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
}
