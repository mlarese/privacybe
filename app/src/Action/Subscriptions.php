<?php
/**
 * Created by PhpStorm.
 * User: mauro.larese
 * Date: 28/08/2018
 * Time: 11:37
 */

namespace App\Action\Import;


use App\Action\AbstractAction;
use App\Resource\PrivacyResource;
use Slim\Http\Request;
use Slim\Http\Response;

class Subscriptions extends AbstractAction  {
    /**
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return mixed
     */
    public function unsubscribeNewsletters(Request $request, Response $response, $args) {

        try {
            $_k = $request->getParam('_k');
            $params = $this->urlB64DecodeToArray($_k);
            $email = $params['email'];
            $ownerId = $params['ownerId'];

            $privacyResource = new PrivacyResource( $this->getEmPrivacy(2));
            $privaces = $privacyResource->privacyRecord($email);

            $today = new \DateTime();
            foreach ($privaces as &$priv) {
                // flags
                $flags = &$priv['privacyFlags'];
                foreach ($flags as $key => &$value) {
                    if($key === 'newsletter' || $key === 'newsletter' ) {
                        $value['selected'] = false;
                        $value['unsubscribe'] = $today;
                    }
                }

                // trattamenti da informativa accettata
                $term =  &$priv['privacy'];
                $paragraphs =  &$term['paragraphs'];
                foreach ($paragraphs as &$parag) {
                    $treatments = &$parag['treatments'];
                    foreach ($treatments as $key => &$value) {
                        if($key === 'newsletter' || $key === 'newsletter' ) {
                            $value['selected'] = false;
                            $value['unsubscribe'] = $today;
                        }
                    }
                }


                $privacyResource->updateFlags($flags, $term, $priv['id']);

            }

        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error unsubscribing') ;
        }

        return $response->withJson($this->success()) ;
    }
}
