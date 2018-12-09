<?php

namespace GDPR\Batch;


use GuzzleHttp\Client;

class EmailSender{
    private $container;

    /**
     * EmailSender constructor.
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    public function sendEmail($from, $to, $subject, $body, $sender='dataone'){
        /** @var Client $cli */
        $client = $this->container['email_client'];

        $to = 'mauro.larese@gmail.com';
        $data = [
            'allow_redirects' => false,
            'headers' => [ 'Accept-Encoding' => 'gzip', 'Accept' => 'application/json', 'Content-Type' => 'application/json'],
            'json' => [ 'sender' => $sender,  'from' => $from, 'to' => $to, 'subject' => $subject, 'body' => $body ]
        ];

        return $client->request('POST', '', $data);
    }

}
