<?php

namespace App\Resource;


use App\Entity\Privacy\PrivacyDeferred;
use App\Entity\Proxy\PrivacyDeferredProxy;
use App\Service\DeferredPrivacyService;
use Doctrine\ORM\EntityManager;


class DeferredPrivacyResource extends AbstractResource {
    /** @var DeferredPrivacyService */
    private $service;

    /**
     * DeferredPrivacyResource constructor.
     *
     * @param EntityManager $em
     * @param               $service
     */
    public function __construct(EntityManager $em, $service) {
        parent::__construct($em);
        $this->service = $service;
    }

    /**
     * @param string      $deferredUid
     * @param             $status
     * @param string|null $privacyUid
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function setStatus(string $deferredUid, $status, string $privacyUid=null ) {
         $this->service->setStatus($deferredUid, $this->entityManager, $status, $privacyUid);
    }

    /**
     * @param string      $deferredUid
     * @param string|null $privacyUid
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function setVisited(string $deferredUid, string $privacyUid=null ) {
        $this->service->setVisited($deferredUid, $this->entityManager,  $privacyUid);
    }

    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    public function getRepository() {
        return $this->entityManager->getRepository(PrivacyDeferred::class);
    }

    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    public function getProxyRepository() {
        return $this->entityManager->getRepository(PrivacyDeferredProxy::class);
    }

    /**
     * @param string $type
     *
     * @return PrivacyDeferred[]
     */
    public function retrieveOpened($type = DeferredPrivacyService::DEFERRED_TYPE_DOUBLE_OPTIN) {
        return $this->getProxyRepository()
            ->findBy([
                'deleted'=>0,
                'type'=>$type,
                'status'=> DeferredPrivacyService::DEFERRED_STATUS_OPEN
            ]);


    }
}
