<?php

namespace App\Resource;


use App\Entity\Privacy\Privacy;
use App\Entity\Privacy\PrivacyHistory;
use Doctrine\Common\Collections\Criteria;
use http\Env\Response;
use function json_encode;

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

    public function privacyList() {
        $repo = $this->getRepository();
        $termRes = new TermResource($this->entityManager);
        $termMap = $termRes->map();
        $ex = $this->entityManager->getExpressionBuilder();
        $results = [];

        $qb = $repo->createQueryBuilder('p');
        $qb
            ->select([
                'p.name',
                'p.surname',
                'p.id',
                'p.ip',
                'p.created',
                'p.domain',
                'p.site',
                'p.termId',
                'p.privacyFlags',
                'p.email'
            ])
            ->where('p.deleted=0')
            ->andWhere( $ex->not("p.email=''") )
            ->andWhere( $ex->not("p.email IS NULL") )
            ->addOrderBy( 'p.email', 'ASC')
            ->addOrderBy( 'p.domain', 'ASC')
            ->addOrderBy( 'p.site', 'ASC')
            ->addOrderBy( 'p.created', 'DESC')

        ;

        $results = $qb->getQuery()->getResult();

        foreach ($results as &$pr) {
            $uid = $pr['termId'];
            $pr['page'] = $pr['domain'].$pr['site'] ;
            $pr['denomination'] = $pr['surname'].' '.$pr['name'] ;
            if(isset($uid) && "$uid"!="0") {
                if(isset($termMap[$uid])) {
                    $pr['termName'] = $termMap[$uid]['name'];
                }
            } else {
                $pr['termName'] = 'standard';
            }
        }

        return $results;
    }

    public function groupByEmailSite($list) {
        $res = [];
        foreach ($list as $r) {
            if(!isset(     $res      [$r['email']]       [$r['domain'].$r['site']]       ))
                           $res      [$r['email']]       [$r['domain'].$r['site']]   = $r;
        }
        return $res;
    }
}
