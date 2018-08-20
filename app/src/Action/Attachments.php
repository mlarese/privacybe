<?php

namespace App\Action;


use App\Base\BaseAction;
use App\Entity\Privacy\PrivacyAttachment;

class Attachments extends BaseAction
{

    public function clazz()
    {
        return PrivacyAttachment::class;
    }

    function baseParams()
    {
        return ['deleted'=>0];
    }

    public function mandatoryFields()
    {
        return [];
    }
}
