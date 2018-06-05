<?php
namespace App\Resource;

use App\Resource\MandatoryFieldMissingException;
use Doctrine\ORM\EntityManager;
use Exception;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

abstract class AbstractResource
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager = null;

    public function toJson($obj) {
        $on = new ObjectNormalizer();
        $on->setCircularReferenceLimit(1);
        $on->setCircularReferenceHandler(function ($object) { return $object->getId(); });

        $dtn = new DateTimeNormalizer('Y-m-d');
        $s = new Serializer(array($dtn, $on), array(new JsonEncoder()) );

        return $s->normalize($obj,'json');
    }

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return string
     * @throws Exception
     */
    public static function guidv4()
    {
        $data = random_bytes(16);
        assert(strlen($data) == 16);

        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

}
