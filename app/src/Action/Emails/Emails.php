<?php
namespace App\Action\Emails;
use App\Action\AbstractAction;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Slim\Http\Request;
use Slim\Http\Response;

class Emails extends AbstractAction {

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     */

    public function privacyRequest($request, $response, $args) {

        $lang = 'it';

        $d = [
            "name" => 'Mauro',
            "surname" => 'Larese'
        ];


        $tpl = new TemplateBuilder(
            'subscription-info-email',
            $d,
            $lang
        );

        $body = $tpl->render();

        try {
            $client = $this->getEmailClient();
            $data = [
                'allow_redirects' => false,
                'headers' => [ 'Accept-Encoding' => 'gzip', 'Accept' => 'application/json', 'Content-Type' => 'application/json',
                ],
                'json' => [
                    'sender' => 'dataone',
                    'from' => 'mauro.larese@mm-one.com',
                    'to' => 'mauro.larese@gmail.com',
                    'subject' => 'Test email',
                    'body' => $body
                ]
            ];
            $client->request('POST', '', $data);
        } catch (GuzzleException $e) {
            echo $e->getMessage();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
 
        return $response->withJson($this->success()) ;
    }
}
