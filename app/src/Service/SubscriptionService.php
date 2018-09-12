<?php
/**
 * Created by PhpStorm.
 * User: mauro.larese
 * Date: 12/09/2018
 * Time: 14:27
 */

namespace App\Service;


use App\Entity\Privacy\Privacy;
use App\Traits\UrlHelpers;
use Doctrine\ORM\EntityManager;
use Slim\Container;

class SubscriptionService {
    use UrlHelpers;
    public function subscriptionsLink(Container $container,$email,$ownerId,$domain, $lang) {
        $_k= "email=$email&ownerId=$ownerId,domain=$domain";
        $enc = $container->get('encryptor');
        $_k = $this->urlB32EncodeString($_k, $enc);
        $link = "https://privacy.dataone.online/manager/surfer/domainprivacies?_k=$_k&lang=$lang";
        return $link;
    }
    /**
     * @param $flags
     * @param $term
     * @param $user
     *
     * @return array
     */
    public function setUnsubFromNesletters( &$flags, &$term, $user) {
        $today = new \DateTime();
        foreach ($flags as &$value) {
            if($value['code'] === 'newsletter' || $value['code'] === 'newsletter' ) {
                $value['selected'] = false;
                $value['unsubscribe'] = $today;
                $value['user'] = $user;

            }
        }

        // trattamenti da informativa accettata
        $paragraphs =  &$term['paragraphs'];
        foreach ($paragraphs as &$parag) {
            $treatments = &$parag['treatments'];
            foreach ($treatments as $key => &$value) {
                if($value['code'] === 'newsletter' || $value['code'] === 'newsletter' ) {
                    $value['selected'] = false;
                    $value['unsubscribe'] = $today;
                    $value['user'] = $user;
                }
            }
        }

        return ["flags"=>$flags,"term"=>$term ];
    }

    public function unsubFromNewsletters (EntityManager $em, $privaciesIds, $user) {
        foreach ($privaciesIds as $id ) {
            /** @var Privacy $pr */
            $pr = $em->find(Privacy::class, $id);

            $flags = $pr->getPrivacyFlags();
            $term = $pr->getPrivacy();
            $res = $this->setUnsubFromNesletters($flags, $term, $user);

            $pr->setPrivacyFlags($res['flags'])
                ->setPrivacy($res['term']);
            $em->merge($pr);
            $em->flush();
        }

    }
}
