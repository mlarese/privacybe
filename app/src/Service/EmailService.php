<?php
/**
 * Created by PhpStorm.
 * User: mauro.larese
 * Date: 27/08/2018
 * Time: 10:17
 */

namespace App\Service;


use App\Action\Emails\EmailHelpers;
use App\Traits\UrlHelpers;
use Slim\Container;

class EmailService {
    use EmailHelpers;
    use UrlHelpers;

    public function notifyModAccepted(Container $container, $from, $to, $language, $name, $surname) {
            $templateData = [
                "name"=>$name,
                "surname"=>$surname
            ];

            $this->sendGenericEmail(
                $this->getContainer(),
                $templateData,
                'notify_mod_accepted',
                'language',
                $from,
                $to);
    }

    public function notifyPrivacyModExecuted(Container $container, $from, $to, $language, $name, $surname) {
        $templateData = [
            "name"=>$name,
            "surname"=>$surname
        ];

        $this->sendGenericEmail(
            $this->getContainer(),
            $templateData,
            'notify_privacy_mod_executed',
            'language',
            $from,
            $to);
    }

}
