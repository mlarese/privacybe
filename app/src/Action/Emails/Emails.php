<?php
namespace App\Action\Emails;
use App\Action\AbstractAction;
use App\Resource\EmailResource;
use function base64_encode;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Slim\Http\Request;
use Slim\Http\Response;
use function urlencode;

class Emails extends AbstractAction {



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
