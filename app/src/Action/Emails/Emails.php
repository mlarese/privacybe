<?php
namespace App\Action\Emails;
use App\Action\AbstractAction;
use App\Resource\EmailResource;

use App\Traits\UrlHelpers;
use function base64_encode;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Slim\Http\Request;
use Slim\Http\Response;
use function urlencode;

class Emails extends AbstractAction {

    use UrlHelpers;
    use Environment;

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     *
     * @return mixed
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function unsubscribeEmail($request, $response, $args) {
        // _k=urlenc(base64(email=&owner=)) & l=language
        try {
            $lang = $request->getParam('l');
            $_k = $request->getParam('_k');
            $emailSender = $this->getContainer()->get('email_sender');
            $tpbuilder = $this->getContainer()->get('news_unsub_email_notif_template_builder');

            echo $_SERVER["REMOTE_ADDR"];
            die;

            $settings =  $this->getContainer()->get('settings');
            $confirmLink = $settings[$deferredTYPE]['prod']['confirm_link'];
            $aEmailSubject = $deferredSettings[$deferredTYPE]['all']['dictionary']['email_subject'];

            $params = $this->urlB64DecodeToArray($_k);
                $data=[
                    'enclink'=>"$confirmLink?_k=$_k&l=$lang"
                ];

                $body = $tpbuilder->render($data,lang);
                $emailSender->sendEmail(
                    $own->getEmail(),
                    $priv->getEmail(),
                    $emailSubject,
                    $body
                );
        } catch (GuzzleException $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Email Error ') ;
        } catch (Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error ') ;
        }

        // return $response->withJson($this->success()) ;
    }


    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     */
    public function privacyRequestTest($request, $response, $args) {
        try {
            $lang = 'it';
            $email = 'mauro.larese@gmail.com';
            $emailRes = new EmailResource($this->getEmPrivacy(34));
            $body = $emailRes->privacyRequest($lang, $email,$this->getEmailClient());

            echo $body;

        } catch (GuzzleException $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Guzzle Error ') ;
        } catch (Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error ') ;
        }

        // return $response->withJson($this->success()) ;
    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     */
    public function doubleOptinConfirm($request, $response, $args) {
        try {
            $lang = 'it';

            $ownerId = 34;
            $prv = '9fde1360-88f0-11e8-82a7-a14515583fe0';

            $ownerId =  urlencode( base64_encode( $this->getEncryptor()->encrypt($ownerId) ) );
            $prv = urlencode( base64_encode( $this->getEncryptor()->encrypt($prv) ) );


            $d = [
                "enclink" => "http://zzz.com?_k=$ownerId&_j=$prv"
            ];

            echo ("s=1&_j=$prv&_k=$ownerId&=2");

            die;
            $tpl = new TemplateBuilder( 'double-optin', $d, $lang );
            $body = $tpl->render();


            $client = $this->getEmailClient();
            $data = $this->buildGuzzleData('mauro.larese@mm-one.com','mauro.larese@gmail.com', 'Test email',$body  ) ;
            $client->request('POST', '', $data);
        } catch (GuzzleException $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Guzzle Error ') ;
        } catch (Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error ') ;
        }

        return $response->withJson($this->success()) ;
    }
}
