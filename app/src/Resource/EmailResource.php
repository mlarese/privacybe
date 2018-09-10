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
use App\Entity\Proxy\OwnerProxy;
use DateTime;
use Doctrine\ORM\EntityManager;
use Exception;
use function explode;
use GuzzleHttp\Client;
use Slim\Container;
use function str_replace;

class EmailResource extends AbstractResource{
    private $confEntityManager;
    use EmailHelpers;

    public function __construct(EntityManager $prvEntityManager, EntityManager $confEntityManager) {
        parent::__construct($prvEntityManager);
        $this->confEntityManager = $confEntityManager;
    }

    public function composePrivaciesDataAll($lang, $mail, $ownerId,$privacyId = null) {

        $privacyRes = new PrivacyResource($this->entityManager);
        $privacies = $privacyRes->privacyRecord($mail);
        $opRes = new OperatorResource($this->getEntityManager());

        $owner = '';
        $ownerRec = null;

        try {
            /** @var Operator $rep */
            $rep = $opRes->getOwner();
            $owner = $rep->getName() . ' ' . $rep->getSurname();

            /** @var OwnerProxy $ownerRec */
            $ownerRec = $this->confEntityManager->find(OwnerProxy::class,$ownerId );

        } catch (Exception $e) {
        }

        $now = new DateTime();
        $name = "";
        $surname = "";
        $createdDate = date_format($now, "d/m/Y");
        $createdTime = date_format($now, "H:i");

        foreach ($privacies as $pruid => &$domain) {
            foreach ($domain as &$term) {
                    $name = $term['name'];
                    $surname = $term['surname'];
                    break;
            }
        }

        $d = [
            "name" => $name,
            "surname" => $surname,
            "createdDate" => $createdDate,
            "createdTime" => $createdTime,
            "privacies" => $privacies,
            "domain" => null,
            "resp" => $owner,
            "rep" => $rep,
            "owner" => $ownerRec
        ];

        return $d;
    }

    public function composePrivaciesData($lang, $mail, $ownerId, $reqDomain,$privacyId = null) {

        $privacyRes = new PrivacyResource($this->entityManager);
        $privacies = $privacyRes->privacyRecord($mail);
        $opRes = new OperatorResource($this->getEntityManager());

        $owner = '';
        $ownerRec = null;

        try {
            /** @var Operator $rep */
            $rep = $opRes->getOwner();
            $owner = $rep->getName() . ' ' . $rep->getSurname();

            /** @var OwnerProxy $ownerRec */
            $ownerRec = $this->confEntityManager->find(OwnerProxy::class,$ownerId );

        } catch (Exception $e) {
        }

        $now = new DateTime();
        $name = "";
        $surname = "";
        $createdDate = date_format($now, "d/m/Y");
        $createdTime = date_format($now, "H:i");
        $areqDomain = explode('://', $reqDomain);
        if (count($areqDomain) === 2) {
            $reqDomain = str_replace('/', '', $areqDomain['1']);
        }


        $validPrivacies = [];
        foreach ($privacies as $pruid => &$domain) {
            foreach ($domain as &$term) {
                if ($term['domain'] === $reqDomain) {

                    if ($privacyId !== null) {
                        if ($term['id'] !== $privacyId) continue;
                    }


                    $name = $term['name'];
                    $surname = $term['surname'];

                    $validPrivacies[$pruid][$term['domain']] = $term;

                }

            }
        }

        $d = [
            "name" => $name,
            "surname" => $surname,
            "createdDate" => $createdDate,
            "createdTime" => $createdTime,
            "domain" => $reqDomain,
            "privacies" => $validPrivacies,
            "resp" => $owner,
            "rep" => $rep,
            "owner" => $ownerRec
        ];

        return $d;
    }


    /**
     * @param        $lang
     * @param        $mail
     * @param Client $client
     *
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function privacyRequest($lang, $mail, $ownerId, Container $container,$reqDomain=null ,$privacyId = null, $subject="subscription info") {

        if($reqDomain === null || $reqDomain === ''){
            $d = $this->composePrivaciesDataAll($lang, $mail, $ownerId,$privacyId);
        }else{
            $d = $this->composePrivaciesData($lang, $mail, $ownerId,$reqDomain, $privacyId);
        }


        /** @var OwnerProxy $ownerRec */
        $ownerRec = $d['owner'];
        $body = $this->sendGenericEmail(
            $container,
            $d,
            'subscription_info_email',
            $lang,
            $ownerRec->getEmail(),
            $mail
        );

        return $body;
    }
}
