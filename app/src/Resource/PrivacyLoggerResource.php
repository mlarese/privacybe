<?php

namespace App\Resource;


use App\Entity\Privacy\Privacy;
use App\Entity\Privacy\PrivacyHistory;

class PrivacyLoggerResource extends AbstractResource
{
    /**
     * @param Privacy $p
     * @param $userObj
     * @return PrivacyHistory
     */
    public function operatorPrivacyLog (Privacy $p, $userObj, $flush=true) {
        try {
            $user = $userObj->user;
            $userName = $userObj->userName;
            $role = $userObj->role;

            $privacyEmail = $p->getEmail();
            $jsonPrivacy = $this->toJson($p);
            $jsonPrivacy = json_encode($jsonPrivacy);
            $pId = $p->getId();

            return $this->savePrivacyLog(
                $p->getId(),
                $jsonPrivacy,
                "operator update privacy",
                "privacyid =  $pId surfer = $privacyEmail  Operator $user",
                $flush
            );
        } catch (\Exception $e) { }
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
    public function savePrivacyLog($privacyId, $jsonPrivacy, $type, $description=null, $flush=true)
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

        if($flush)
            $this->entityManager->flush();

        return $ph;
    }


}
