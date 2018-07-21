<?php

namespace App\Batch;


use App\Resource\OwnerResource;

class DeferredPrivacyBatch extends AbstractBatch {
    public function sendDeferredEmails($deferredTYPE = 'double-optin'){
        $emcfg = $this->emBuilder->buildEmConfig();


        $ownres = new OwnerResource($emcfg);
        $owns = $ownres->geOwnersFW();

        foreach ($owns as $own) {

        }

    }

}
