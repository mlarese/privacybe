<?php

namespace App\Base;


use App\Action\Attachments;
use App\Entity\Privacy\PrivacyAttachment;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\ClassMetadata;
use Exception;
use function is_string;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

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

    protected function normalizeData(&$data) {
        /** @var ClassMetadata $metadata */
        $metadata = $this->meta();
        $m=$metadata->fieldMappings;

        foreach ($m as $name => $value) {
            if(!isset($data[$name])) continue;
            $att = $data[$name];
            if($value['type']==='datetime') {
                if(is_string($data[$name]))
                    $data[$name] = new \DateTime($data[$name]);
            }

        }
    }

    public static function hydrateByArray(array $attributes, $clazz) {
        $on = new ObjectNormalizer();
        $on->setCircularReferenceLimit(1);
        $on->setCircularReferenceHandler(function ($object) { return $object->getId(); });

        $dtn = new DateTimeNormalizer();

        $ard = new ArrayDenormalizer();
        //$dtn1 = new DateTimeNormalizer('Y-m-d');
        $s = new Serializer([$dtn, $on, $ard]);
        return  $s->denormalize($attributes, $clazz);
    }


    private function hydrateAdv(array $attributes, $clazz) {
        $this->normalizeData($attributes);
        $on = new ObjectNormalizer();

        $on->setCircularReferenceLimit(1);
        $on->setCircularReferenceHandler(function ($object) { return $object->getId(); });

        $dtn = new DateTimeNormalizer();

        $ard = new ArrayDenormalizer();
        //$dtn1 = new DateTimeNormalizer('Y-m-d');
        $s = new Serializer([$dtn, $on, $ard]);

      return  $s->denormalize($attributes, $clazz);


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
        echo $this->getClazz() . '<br>';
        return $this->getEm()->getRepository($this->getClazz());
    }
    public function create($values) {

        $classname= $this->getClazz();

        $en = $this->hydrateAdv($values, $classname);


        $this->em->merge($en);
    }

    public function update($values, $params) {
        $en = $this->findOneBy($params);
        if(!isset($en)) {
            $classname= $this->getClazz();
            $en = new $classname();
        }
        $this->hydrateAttributes($en, $values);
        $this->em->merge($en);
    }

    /**
     * @param $id
     *
     * @return null|object
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
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
