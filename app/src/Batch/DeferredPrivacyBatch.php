<?php

namespace App\Batch;


use App\Resource\OwnerResource;
use App\Service\DeferredPrivacyService;

class DeferredPrivacyBatch extends AbstractBatch {
    private $emailSender;

    /**
     * DeferredPrivacyBatch constructor.
     * @param $emailSender
     */
    public function __construct(EntityManagerBuilder $emBuilder, $container, EmailSender $emailSender)
    {
        parent::__construct($emBuilder, $container);

        $this->emailSender = $emailSender;
    }

    /**
     * @param string $deferredTYPE
     */
    public function sendDeferredEmails($deferredTYPE = DeferredPrivacyService::DEFERRED_TYPE_DOUBLE_OPTIN){
        $emcfg = $this->emBuilder->buildEmConfig();

        $ownres = new OwnerResource($emcfg);

        $owns = $ownres->geOwnersFW();
        foreach ($owns as $own) {
            // $this->emailSender->sendEmail()
        }

    }

}
