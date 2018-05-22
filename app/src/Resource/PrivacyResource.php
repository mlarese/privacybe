<?php

namespace App\Resource;


use App\Entity\Privacy\Privacy;
use App\Entity\Privacy\PrivacyHistory;

class PrivacyResource extends AbstractResource
{

    /**
     * @param string $jsonPrivacy
     * @param string $type
     * @param null $description
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function savePrivacyLog(string $jsonPrivacy, string $type, $description=null)
    {
        if(!isset($description)) {
            $description = 'privacy '. $type;
        }
       $ph = new PrivacyHistory();
       $ph
           ->setCreated(new \DateTime())
           ->setDescription($description)
           ->setPrivacyId($jsonPrivacy->getId())
           ->setType($type)
           ->setPrivacy($jsonPrivacy)
       ;

       $this->entityManager->persist($ph);
       $this->entityManager->flush();
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
}