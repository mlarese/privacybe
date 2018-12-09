<?php

namespace GDPR\Action;


use GDPR\Base\BaseAction;
use GDPR\Entity\Privacy\Dictionary;
use GDPR\Entity\Privacy\PrivacyAttachment;
use DateTime;
use function is_string;

class Dictionaries extends BaseAction {
    public function clazz() {
        return Dictionary::class;
    }
    public function baseParams() { return []; }
    public function mandatoryFields() { return [];}
}
