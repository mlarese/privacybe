<?php

namespace App\Resource;


use App\Entity\Privacy\Privacy;
use App\Entity\Privacy\PrivacyHistory;
use Doctrine\Common\Collections\Criteria;
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
    public function privacyListFw($criteria=null) {
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

            switch ($sort) {
                case 'default':
                    $qb ->addOrderBy( 'p.email', $sortDirection)
                        ->addOrderBy( 'p.termId', 'ASC')
                        ->addOrderBy( 'p.created', 'DESC')
                        ->addOrderBy( 'p.domain', 'ASC')
                        ->addOrderBy( 'p.site', 'ASC')
                    ;
                    break;
                case 'surname':
                    $qb ->addOrderBy( 'p.email', $sortDirection)
                        ->addOrderBy( 'p.termId', 'ASC')
                        ->addOrderBy( 'p.created', 'DESC')
                        ->addOrderBy( 'p.domain', 'ASC')
                        ->addOrderBy( 'p.site', 'ASC')
                    ;
                    break;

                case 'date':
                    $qb ->addOrderBy( 'p.email', $sortDirection)
                        ->addOrderBy( 'p.termId', 'ASC')
                        ->addOrderBy( 'p.created', 'DESC')
                        ->addOrderBy( 'p.domain', 'ASC')
                        ->addOrderBy( 'p.site', 'ASC')
                    ;
                    break;
            }

        }


        $results = $qb->getQuery()->getResult();

        // guest[reservation_guest_language]":"en"
        foreach ($results as &$pr) {

            $pr['page'] = $pr['domain'].$pr['site'] ;


            $termIdFromPages = '0';
            if(isset($termPageMap[$pr['domain']][$pr['site']])) {
                $termIdFromPages = $termPageMap[$pr['domain']][$pr['site']];
            }

            if($pr['termId']==='0') {
                if(isset($pr['privacy']['termId'])) {
                    $pr['termId'] = $pr['privacy']['termId'];
                } else {
                    $pr['termId'] = $termIdFromPages;
                }
            }

            if($pr['termId']==='0') {
                $pr['termId']='no-term-id';
            }

            if(isset($pr['privacy']['language'])) {
                $pr['language'] =  $pr['privacy']['language'];
            } else if(isset($pr['form']['newsletter[language]'] )) {
                $pr['language'] = $pr['form']['newsletter[language]'];

            } else if(isset($pr['form']['enquiry[enquiry_guest_language]'] )) {
                $pr['language'] = $pr['form']['enquiry[enquiry_guest_language]'];
            } else if(isset($pr['form']['enquiry[enquiry_newsletter_language]'] )) {
                $pr['language'] = $pr['form']['enquiry[enquiry_newsletter_language]'];
            } else if(isset($pr['form']['reservation_guest_language'] )) {
                $pr['language'] = $pr['form']['reservation_guest_language'];
            }else {

                /*$dt = 'it';
                try {
                  $dt = $this->emailDomainType($pr['email']);
                } catch (Exception $e) {
                    echo $dt . ' ' . $pr['email'];
                }

                if(
                    $dt==='it' || $dt==='de' || $dt==='uk' || $dt==='fr' || $dt==='es' || $dt==='de' || $dt==='pl' || $dt==='ru' ||
                    $dt==='al' || $dt==='ar' || $dt==='be' || $dt==='ca' || $dt==='ch' || $dt==='cn' ||  $dt==='at' ||  $dt==='hu' ||
                    $dt==='lu' || $dt==='dk' || $dt==='ee' || $dt==='fi' ||  $dt==='gr' ||  $dt==='cz'
                ) {
                    $pr['language'] =  $dt;
                } else {
                    $pr['language'] =  'it';
                }*/

                $pr['language'] =  'it';

            }
            $pr['language'] =  strtolower($pr['language'] );

            $pr['referrer'] = $pr['page'];
            if(isset($pr['privacy']['referrer']))
                $pr['referrer'] =  $pr['privacy']['referrer'];

            $pr['denomination'] = $pr['surname'].' '.$pr['name'] ;
            $uid = $pr['termId'];
            if(isset($uid) && "$uid"!="0") {
                if(isset($termMap[$uid])) {
                    $pr['termName'] = $termMap[$uid]['name'];
                } else {
                    $pr['termName'] = 'Normativa non memorizzata';
                }
            } else {
                $pr['termName'] = 'Normativa non memorizzata';
            }
            unset($pr['privacy']);
            unset($pr['form']);

        }

        return $results;
    }

    public function privacyList($criteria=null) {
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
            'p.domain',
            'p.site',
            'p.termId',
            'p.privacy',
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
            $person = $criteria['where']['person'] ;
            $sortField = $criteria['sort']['field'] ;
            $sortDirection = $criteria['sort']['direction'] ;

            if(isset($person) && $person!=='') {
                $person="%${person}%";
                $persCond = [ "p.email LIKE :person ", "p.name LIKE :person ",  "p.surname LIKE :person "  ];
                $qb
                    ->andWhere( $ex->orX()->addMultiple($persCond))
                    ->setParameter('person',$person);
                ;
            }

            switch ($sortField) {
                case 'default':
                    $qb ->addOrderBy( 'p.email', $sortDirection)
                        ->addOrderBy( 'p.termId', 'ASC')
                        ->addOrderBy( 'p.created', 'DESC')
                        ->addOrderBy( 'p.domain', 'ASC')
                        ->addOrderBy( 'p.site', 'ASC')
                    ;
                    break;
                case 'surname':
                    $qb ->addOrderBy( 'p.email', $sortDirection)
                        ->addOrderBy( 'p.termId', 'ASC')
                        ->addOrderBy( 'p.created', 'DESC')
                        ->addOrderBy( 'p.domain', 'ASC')
                        ->addOrderBy( 'p.site', 'ASC')
                    ;
                    break;

                case 'date':
                    $qb ->addOrderBy( 'p.email', $sortDirection)
                        ->addOrderBy( 'p.termId', 'ASC')
                        ->addOrderBy( 'p.created', 'DESC')
                        ->addOrderBy( 'p.domain', 'ASC')
                        ->addOrderBy( 'p.site', 'ASC')
                    ;
                    break;
            }

        }


        $results = $qb->getQuery()->getResult();

        foreach ($results as &$pr) {

            $pr['page'] = $pr['domain'].$pr['site'] ;


            $termIdFromPages = '0';
            if(isset($termPageMap[$pr['domain']][$pr['site']])) {
                $termIdFromPages = $termPageMap[$pr['domain']][$pr['site']];
            }

            if($pr['termId']==='0') {
                if(isset($pr['privacy']['termId'])) {
                    $pr['termId'] = $pr['privacy']['termId'];
                } else {
                    $pr['termId'] = $termIdFromPages;
                }
            }

            if($pr['termId']==='0') {
                $pr['termId']='no-term-id';
            }

            if(isset($pr['privacy']['language']))
                $pr['language'] =  $pr['privacy']['language'];
            else
                $pr['language'] =  'it';

            $pr['referrer'] = $pr['page'];
            if(isset($pr['privacy']['referrer']))
                $pr['referrer'] =  $pr['privacy']['referrer'];

            $pr['denomination'] = $pr['surname'].' '.$pr['name'] ;
            $uid = $pr['termId'];
            if(isset($uid) && "$uid"!="0") {
                if(isset($termMap[$uid])) {
                    $pr['termName'] = $termMap[$uid]['name'];
                } else {
                    $pr['termName'] = 'Normativa non memorizzata';
                }
            } else {
                $pr['termName'] = 'Normativa non memorizzata';
            }
            unset($pr['privacy']);

        }

        return $results;
    }

    public function groupByFactory(&$list, $criteria) {
        return $this->groupByEmailTerm($list);
    }

    public function groupByEmailSite(&$list) {
        $res = [];
        foreach ($list as $r) {
            if(!isset(     $res      [$r['email']]       [$r['domain'].$r['site']]       ))
                           $res      [$r['email']]       [$r['domain'].$r['site']]   = $r;
        }
        return $res;
    }

    public function groupByEmailTerm(&$list) {
        $res = [];
        foreach ($list as $r) {
            if(!isset(     $res      [$r['email']]   [$r['termId']]  [$r['domain'].$r['site']]       ))
                           $res      [$r['email']]   [$r['termId']]  [$r['domain'].$r['site']] = $r;
        }
        return $res;
    }

    public function groupByEmail(&$list) {
        $res = [];
        foreach ($list as $r) {
            $email = strtolower($r['email']);

            if(!isset(      $res      [$email]    ))
                            $res      [$email]   = $r;
        }
        return $res;
    }

    public function postSelectfilter(&$list,$criteria) {
        $res = [];
        $res = $list;

        if(isset($criteria['treatments'])) {

        }


        return $res;
    }
}
