<?php

namespace App\Resource;

use App\Entity\Privacy\Term;

class TermResource extends AbstractResource
{
    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    const PUBLISHED = 'published';

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

    public static function emptyTerm() {
        $n = new Term();
        $n->setStatus(self::PUBLISHED)
            ->setCreated(new \DateTime())
            ->setParagraphs(  [self::emptyParagraph()])
            ->setName('')
            ->setUid( self::guidv4())
        ;
        return $n;
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
    }
}