<?php
/**
 * Created by PhpStorm.
 * User: mauroadmin
 * Date: 26/08/18
 * Time: 16:13
 */

namespace App\Action\Emails;


use GuzzleHttp\Client;
use Slim\Container;

trait EmailHelpers
{
    public function buildGuzzleData ($from, $to, $subject, $body, $sender = 'dataone') {
        return [
            'allow_redirects' => false,
            'headers' => [
                'Accept-Encoding' => 'gzip',
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ],
            'json' => [
                'sender' => $sender,
                'from' => $from,
                'to' =>$to,
                'subject' => $subject,
                'body' => $body
            ]
        ];
    }

    public function sendGenericEmail(
        Container $container,
        array $templateData,
        string $templateName,
        string $language,
        string $from,
        string $to
    ) {
        /** @var Client $client */
        $client = $this->container['email_client'];
        /** @var PlainTemplateBuilder $bld */
        $bld=$container->get('template_builder');
            $bld->setTemplateName($templateName);
            $body=$bld->render($templateData, $language);

        $subject = "get subject from settings";
        $data = $this->buildGuzzleData($from,$to, $subject,$body  ) ;
        $client->request('POST', '', $data);
    }

}
