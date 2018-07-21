<?php

namespace App\Batch;


use App\Resource\OwnerResource;

class DeferredPrivacyBatch extends AbstractBatch {
    public function sendDeferredEmails(){
        $emcfg = $this->emBuilder->buildEmConfig();


        $ownres = new OwnerResource($emcfg);
        $owns = $ownres->geOwnersFW();

        foreach ($owns as $own) {

        }

    }

}
