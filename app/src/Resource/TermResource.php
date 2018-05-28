<?php

namespace App\Resource;

use App\Entity\Privacy\Term;
use App\Entity\Privacy\TermHistory;
use App\Entity\Privacy\TermPage;
use DateTime;
use Exception;

class TermResource extends AbstractResource
{
    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    const PUBLISHED = 'published';
    const SUSPENDED = 'suspended';
    const DRAFT = 'draft';

    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    protected function getRepository() {
        return $this->entityManager->getRepository( Term::class);
    }

    /**
     * @param array  $terms
     * @return array
     */
    protected function extractTreatments ($terms){
        $res = [];

        /** @var Term $term */
        foreach ($terms as $term) {
            $parags = $term['paragraphs'];

            $item = [
              "name" =>$term['name'],
              "status" => $term['status'],
              "treatments" => []
            ];


            foreach ($parags as $parag) {
                $treatments = $parag['treatments'];
                $item['treatments'][] = $treatments;
            }

            $res[] = $item;
        }

        return $res;
    }

    /**
     * @return array
     */
    public function termAndTreatmentsFlyWeight () {

        $repo = $this->getRepository();

        $qb = $repo->createQueryBuilder('t');
        $qb
            ->select(['t.name','t.status', 't.uid','t.paragraphs'])
            ->where('t.deleted=0')

        ;

        $results = $qb->getQuery()->getResult();
        $res = $this->extractTreatments($results);

        return $res;
    }

    /**
     * @return array
     * @throws PublishedTermsException
     */
    public function getAllTerms ($groupById=false) {
        $repo = $this->getRepository();
        $res = $repo->findBy(['deleted'=>false, 'status'=>'published']);

        if(count($res)===0){
            throw new PublishedTermsException('No published terms');
        }
        if(!$groupById) {
            return $res;
        }

        $grp = [];
        /** @var TermPage $p */
        foreach ($res as $p) {
            $grp[$p->getTermUid()] = $p;
        }
    }

    /**
     * @param $termPages
     * @throws PublishedTermsException
     */
    public function getTermFromPages ($termPages) {
        $allTerms = $this->getAllTerms(true);

        /** @var TermPage $termPage */
        foreach ($allTerms as $term) {
            $id = $termPage->getTermUid();


        }
    }

    public static function emptyParagraph() {
        return [
            "title"=>"",
            "text"=> ["it"=>""],
            "treatments"=> [[
                "name"=>"",
                "restrictive"=>false,
                "mandatory"=>false,
                "text"=>[
                    "it"=>""
                ]
            ]]
        ];
    }

    public static function emptyTerm($user) {
        $options = [
            "history" => [
                ["action" => "creation", "date" => new DateTime(), "user"=>$user, "description"=>""]
            ]
        ];
        $n = new Term();
        $n->setStatus(self::DRAFT)
            ->setCreated(new \DateTime())
            ->setParagraphs(  [self::emptyParagraph()])
            ->setName('')
            ->setUid( self::guidv4())
            ->setOptions($options)
            ->setPages([])
        ;
        return $n;
    }

    /**
     * @param string $type
     * @param string $term
     * @param        $termuid
     * @param        $userId
     * @param null   $description
     *
     * @return TermHistory
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function saveLog(string $type, $term, $termuid, $userId,$description=null) {
        /** @var TermHistory $log */
        $log = new TermHistory();

        $log
            ->setCreated(new DateTime())
            ->setDescription($description)
            ->setModifier($userId)
            ->setTerm($term)
            ->setTermUid($termuid)
            ->setType($type)
        ;

        $this->entityManager->persist($log);
        $this->entityManager->flush();

        return $log;
    }

    /**
     * @param $name
     * @param $options
     * @param $paragraphs
     * @param $status
     * @param $uid
     * @return Term
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function insert(
        $name,
        $options,
        $paragraphs,
        $status,
        $uid
    ){
        if ($paragraphs === null ) {
            $paragraphs=[$this->emptyParagraph()];
        }

        if ($status === null ) {
            $status= self::PUBLISHED;
        }

        $term = new Term();
            $term->setDeleted(0)
                ->setCreated(new \DateTime())
                ->setName($name)
                ->setOptions($options)
                ->setParagraphs($paragraphs)
                ->setStatus($status)
                ->setUid($uid)
            ;

        $this->entityManager->persist($term);
        $this->entityManager->flush();

        return $term;
    }

    /**
     * @param $uid
     * @param $name
     * @param $deleted
     * @param $status
     * @param $paragraphs
     * @param $options
     * @return Term
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function update(
        $uid,
        $name,
        $deleted,
        $status,
        $paragraphs,
        $options
    ){

        /** @var Term $term */
        $term = $this->entityManager->find(Term::class, $uid);

        if ($name !== null ) $term->setName($name);
        if ($deleted !== null ) $term->setDeleted($deleted);

        if($status === self::PUBLISHED && $term->getStatus() !== $status) {
            $term->setPublished(new DateTime());
        } else if( $status === self::SUSPENDED && $term->getStatus() !== $status) {
            $term->setSuspended(new DateTime());
        }

        $term->setModified(new DateTime());

        if ($status !== null ) $term->setStatus($status);
        if ($paragraphs !== null ) $term->setParagraphs($paragraphs);
        if ($options !== null ) $term->setOptions($options);


        $this->entityManager->merge($term);
        $this->entityManager->flush();

        return $term;
    }


    /**
     * @return array
     */
    public function map(){
        $repo = $this->getRepository();

        $qb = $repo->createQueryBuilder('t');
        $qb
            ->select([
                't.name',
                't.status',
                't.uid'
            ])
            ->where('t.deleted=0')

        ;

        $results = $qb->getQuery()->getResult();
        $res = [];

        foreach ($results as $term){
            $res[$term['uid']] = $term;
        }

        return $res;
    }

}
