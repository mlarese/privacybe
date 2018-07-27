<?php

namespace App\Resource;


use App\Entity\Privacy\PrivacyDeferred;
use App\Entity\Proxy\PrivacyDeferredProxy;
use App\Service\DeferredPrivacyService;


class DeferredPrivacyResource extends AbstractResource {
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
