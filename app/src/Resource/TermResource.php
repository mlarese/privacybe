<?php

namespace App\Resource;

use App\Entity\Privacy\Term;
use App\Entity\Privacy\TermHistory;
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

    protected function getRepository() {
        return $this->entityManager->getRepository( Term::class);
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
     * @param $modified
     * @param $published
     * @param $suspended
     * @param $status
     * @param $paragraphs
     * @param $options
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     * @throws Exception
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



}
