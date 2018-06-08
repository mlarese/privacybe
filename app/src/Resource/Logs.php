<?php

namespace App\Resource;


use App\Entity\Config\ActionHistory;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class Logs
{
    /**
     * @param $userData
     * @param $type
     * @param null $description
     * @return ActionHistory
     */
    public static function actionLog ($userData, $type, $description=null, $entity=null){
        /** @var ActionHistory $ah */
        $ah=new ActionHistory();


        if(!isset($description) || $description==='') {
            $description = $type . ' user ' . $userData->user;
        }

        try {
            $ah->setDate(new \DateTime())
                ->setType($type)
                ->setUserName($userData->user)
                ->setDescription($description);
        } catch (\Exception $e) {

        }


        $json=null;
        if(isset($entity)) {
            $json = self::toJson($entity);
            $json = json_encode($json);
            $ah->setHistory($json);
        }


        return $ah;
    }

    /**
     * @param $obj
     * @return array|bool|float|int|object|string
     */
    public static function toJson($obj) {
        $on = new ObjectNormalizer();
        $on->setCircularReferenceLimit(1);
        $on->setCircularReferenceHandler(function ($object) { return $object->getId(); });

        $dtn = new DateTimeNormalizer('Y-m-d');
        $s = new Serializer(array($dtn, $on), array(new JsonEncoder()) );

        return $s->normalize($obj,'json');
    }

}