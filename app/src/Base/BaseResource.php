<?php

namespace App\Base;


use Doctrine\ORM\EntityManager;

trait BaseResource
{
    /** @var EntityManager */ private $em;
    /** @var array */ private $baseParams;
    /** @var string */ private $clazz;

    /**
     * @return EntityManager
     */
    public function getEm(): EntityManager
    {
        return $this->em;
    }

    /**
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function flush() {
        $this->em->flush();
    }
    /**
     * @return array
     */
    public function getBaseParams(): array
    {
        return $this->baseParams;
    }

    private function hydrateAttributes(&$entity, array $attributes, $scope = '')
    {
        $metadata = $this->meta();
        foreach ($attributes as $name => $value) {
            if (!isset($metadata->reflFields[$name])) {
                continue;
            }
            $this->setObjectProperty($entity, $name, $value);
        }
        return $entity;
    }
    /**
     * @param array $baseParams
     */
    public function setBaseParams(array $baseParams): void
    {
        $this->baseParams = $baseParams;
    }

    /**
     * @return string
     */
    public function getClazz(): string
    {
        return $this->clazz;
    }

    /**
     * @param string $clazz
     */
    public function setClazz(string $clazz): void
    {
        $this->clazz = $clazz;
    }

    /**
     * @return \Doctrine\ORM\Mapping\ClassMetadata
     */
    protected function meta () {
        return $this->em->getClassMetadata($this->getClazz());
    }

    /**
     * @return string
     * @throws \Doctrine\ORM\Mapping\MappingException
     */
    protected function idName () {
        $this->meta()->getSingleIdentifierFieldName();
    }
    /**
     * @param EntityManager $em
     */
    public function setEm(EntityManager $em): void
    {
        $this->em = $em;
    }

    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    public function repository () {
        return $this->getEm()->getRepository($this->getClazz());
    }
    public function create($values) {
        $classname= new $this->getClazz();
        $en = new $classname();
        $this->em->persist($en);
    }

    public function update($values, $params) {
        $en = $this->findOneBy($params);
        $this->hydrateAttributes($en, $values);
        $this->em->merge($en);
    }
    public function find($id) {
        return $this->em->find($this->getClazz(),$id);
    }
    public function findOneBy($params=[]) {
        return $this->repository()->findOneBy(array_merge($this->getBaseParams(), $params));
    }

    public function findBy($params=[]) {
        return $this->repository()->findBy(array_merge($this->getBaseParams(), $params));
    }

    public function remove($params) {
        $this->getEm()->remove( $this->findOneBy($params) );
    }
    private function setObjectProperty(&$entity, $name, $value)
    {
        $setter = 'set'.ucfirst($name);
        if (!method_exists($entity, $setter)) {
            return null;
        }
        return $entity->$setter($value);
    }
}
