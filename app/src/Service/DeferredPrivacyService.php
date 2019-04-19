<?php
namespace App\Service;


use App\DoctrineEncrypt\Encryptors\EncryptorInterface;
use App\Entity\Privacy\Privacy;
use App\Entity\Privacy\PrivacyDeferred;
use DateTime;
use Doctrine\ORM\EntityManager;

class DeferredPrivacyService extends SlimAbstractService {
    const DEFERRED_TYPE_DOUBLE_OPTIN = 'double_optin';
    const DEFERRED_TYPE_NO = '#NO#';

    const DEFERRED_STATUS_OPEN = 1;
    const DEFERRED_STATUS_ELABORATED = 2;
    const DEFERRED_STATUS_VISITED = 3;
    const DEFERRED_STATUS_CLOSE = 0;
    const DEFERRED_VALUE = '####';


    /**
     * @param array  $privacy
     *
     * @return array
     */
    public function emptyPrivacy($privacy) {
        foreach ($privacy['paragraphs'] as &$p) {
            foreach ($p['treatments'] as &$t) {
                $t['selected'] = false;
                $t['type'] = self::DEFERRED_TYPE_DOUBLE_OPTIN;
            }
        }
        return $privacy;
    }

    /**
     * @param array  $flags
     * @param string $deferredAction
     *
     * @return array
     */
    public function emptyFlags($flags, $deferredAction = self::DEFERRED_TYPE_DOUBLE_OPTIN) {
        $defFlags = [];

        foreach ($flags as $flag) {
            $flag['selected'] = false;
            $flag['deferred'] = true;
            $flag['deferred_type'] = self::DEFERRED_TYPE_DOUBLE_OPTIN;

            $defFlags[] = $flag;
        }
        return $defFlags;
    }
    /**
     * @param $privacy Privacy
     *
     * @return PrivacyDeferred
     */
    public function setDeferred(&$privacy, $deferredType) {
        $dblPrv = new PrivacyDeferred();

        $dblPrv
            ->setCreated( $privacy->getCreated() )
            ->setCryptedForm( $privacy->getCryptedForm())
            ->setDeleted(0)
            ->setDomain( $privacy->getDomain())
            ->setEmail( $privacy->getEmail())
            ->setForm( $privacy->getForm())
            ->setId( $privacy->getId())
            ->setIp( $privacy->getIp())
            ->setLanguage( $privacy->getLanguage())
            ->setName( $privacy->getName())
            ->setPage( $privacy->getPage())
            ->setPrivacy( $privacy->getPrivacy())
            ->setPrivacyFlags( $privacy->getPrivacyFlags())
            ->setRef( $privacy->getRef())
            ->setSite( $privacy->getSite())
            ->setSurname( $privacy->getSurname())
            ->setTelephone( $privacy->getTelephone())
            ->setTermId( $privacy->getTermId())
            ->setPrivacyId( $privacy->getId())
            ->setType($deferredType)
            ->setStatus(self::DEFERRED_STATUS_OPEN)

        ;


        $eFlags = $this->emptyFlags( $privacy->getPrivacyFlags() );
        $ePrivacy = $this->emptyPrivacy( $privacy->getPrivacy() );

        $privacy
            ->setCryptedForm(null)
            ->setDomain(self::DEFERRED_VALUE)
            ->setForm(null)
            ->setIp(self::DEFERRED_VALUE)
            ->setPage(self::DEFERRED_VALUE)
            ->setSite(self::DEFERRED_VALUE)
            ->setPrivacy( $ePrivacy)
            ->setPrivacyFlags($eFlags)
        ;

        return $dblPrv;
    }

    /**
     * @param string        $deferredUid
     * @param EntityManager $em
     * @param string|null   $privacyUid
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function setStatus(string $deferredUid, EntityManager $em, $status, string $privacyUid=null ) {
        if($privacyUid === null){
            $privacyUid = $deferredUid;
        }

        /** @var PrivacyDeferred $defR */
        $defR = $em->find(PrivacyDeferred::class, $deferredUid);

        $defR
            ->setStatus( $status)
            ->setUpdated( new DateTime())
        ;
        if(
            $status === DeferredPrivacyService::DEFERRED_STATUS_VISITED
        ) {
            /** @var Privacy $pryR */
            $pryR = $em->find(Privacy::class, $privacyUid);

            if (isset($pryR)) {
                $pryR
                    ->setCryptedForm($defR->getCryptedForm())
                    ->setDomain($defR->getDomain())
                    ->setForm($defR->getForm())
                    ->setIp($defR->getIp())
                    ->setPage($defR->getPage())
                    ->setSite($defR->getSite())
                    ->setPrivacy($defR->getPrivacy())
                    ->setPrivacyFlags($defR->getPrivacyFlags());
                $em->merge($pryR);
            }

            $em->merge($defR);


            $em->flush();
        }

    }

    /**
     * @param string        $deferredUid
     * @param EntityManager $em
     * @param string|null   $privacyUid
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function setVisited(string $deferredUid, EntityManager $em, string $privacyUid=null ) {
        $this->setStatus($deferredUid, $em,DeferredPrivacyService::DEFERRED_STATUS_VISITED,$privacyUid );
    }

    /**
     * @param string        $deferredUid
     * @param EntityManager $em
     * @param string|null   $privacyUid
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function setClosed(string $deferredUid, EntityManager $em, string $privacyUid=null ) {
        $this->setStatus($deferredUid, $em,DeferredPrivacyService::DEFERRED_STATUS_CLOSE,$privacyUid );
    }

    public function setElaborated(string $deferredUid, EntityManager $em, string $privacyUid=null ) {
        $this->setStatus($deferredUid, $em,DeferredPrivacyService::DEFERRED_STATUS_ELABORATED,$privacyUid );
    }


    public function findDeferredPrivacies(EntityManager $em, $type = DeferredPrivacyService::DEFERRED_TYPE_DOUBLE_OPTIN){

    }

    public function sendDeferredConfirmEmails() {
        /** @var EncryptorInterface $enc */
        $enc = $this->getDependency('encryptor');


    }

}
