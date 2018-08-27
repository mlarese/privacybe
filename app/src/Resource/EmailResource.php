<?php
/**
 * Created by PhpStorm.
 * User: mauro.larese
 * Date: 18/07/2018
 * Time: 10:30
 */

namespace App\Resource;


use App\Action\Emails\EmailHelpers;
use App\Action\Emails\TemplateBuilder;
use App\Entity\Privacy\Operator;
use DateTime;
use Exception;
use function explode;
use GuzzleHttp\Client;
use function str_replace;

class EmailResource extends AbstractResource{
    use EmailHelpers;


    /**
     * @param        $lang
     * @param        $mail
     * @param Client $client
     *
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function privacyRequest($lang, $mail, Client $client) {

        //$privacy = require ('fixtures/privacy.php');
        //$privacies = json_decode($privacy, true);

        $privacyRes = new PrivacyResource($this->entityManager);
        $privacies = $privacyRes->privacyRecord($mail);

        $opRes = new OperatorResource($this->entityManager);

        $owner = '';


        try {
            /** @var Operator $rep */
            $rep = $opRes->getOwner();
            $owner = $rep->getName() . ' ' . $rep->getSurname();
        } catch (Exception $e) {
        }

        $now = new DateTime();
        $name = "";
        $surname = "";
        $createdDate =  date_format( $now , "d/m/Y");
        $createdTime = date_format( $now , "H:i");
        $reqDomain = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

        $areqDomain = explode('://',$reqDomain);
        if(count($areqDomain) === 2) {
            $reqDomain = str_replace('/','', $areqDomain['1'] );
        }

        foreach($privacies as $pruid=>&$domain){
            foreach($domain as &$term){
                $name = $term['name'];
                $surname  = $term['surname'];

                if($reqDomain === 'localhost:8080')
                    $reqDomain = $term['domain'];

                break;
            }
        }


        //print_r($privacies); die;


        $d = [
            "name" => $name,
            "surname"=>$surname,
            "createdDate"=>$createdDate,
            "createdTime"=>$createdTime,
            "domain"=>$reqDomain,
            "privacies" => $privacies,
            "resp" => $owner
        ];


        $tpl = new TemplateBuilder( 'subscription_info_email', $d, $lang );
        $body = $tpl->render();

        $data = $this->buildGuzzleData('mauro.larese@mm-one.com','mauro.larese@gmail.com', 'Test email',$body  ) ;
        $client->request('POST', '', $data);

        return $body;
    }
}
