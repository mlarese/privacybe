<?php
namespace App\Action;

use App\Entity\Config\Domain;
use App\Entity\Config\Page;
use App\Entity\Privacy\Privacy;
use App\Entity\Privacy\Term;
use App\Entity\Privacy\TermPage;
use DateTime;
use Doctrine\ORM\EntityManager;
use Exception;
use function print_r;
use Slim\Http\Request;
use Slim\Http\Response;

class PrivacyManager extends AbstractAction
{

    /**
     * @return string
     */
    private function getIp () {
        return $_SERVER['REMOTE_ADDR'];
    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function getWidgetTerm($request, $response, $args) {
        $lang = $request->getHeader('Language')[0];
        $pageName = $request->getHeader('Page')[0];
        $domainName = $request->getHeader('Domain')[0];
        $ownerId = $request->getHeader('OwnerId')[0];
        $ref = $request->getHeader('Ref')[0];
        $termId = $request->getHeader('TermId')[0];

        // die(" lang=$lang, pageName=$pageName, domainName=$domainName, ownerId=$ownerId, ref=$ref, termId=$termId");

        /** @var EntityManager $em */
        $cem = $this->getEmConfig();

        /** @var EntityManager $em */
        $em = $this->getEmPrivacy($ownerId);

        if($termId===''){
            /** @var TermPage $termPage  */
            $termPage = $em
                        ->getRepository(TermPage::class)
                        ->findOneBy(array('domain' => $domainName, 'page' => $pageName));

            If(!isset($termPage)) {
                return $response->withStatus(403, "Page $domainName$pageName not found (owner $ownerId)");
            }

            $termId = $termPage->getTermUid();
        }

        /** @var Terms $term */
        $term = null;
        try {
            $term =  $em->find(Term::class, $termId);
        } catch(\Exception $e) {
            return $response->withStatus(403, $e->getMessage());
        }

        If(!isset($term)) {
            return $response->withStatus(403, "Term not found");
        }

        $paragraphs = $term->getParagraphs();

        $termResponse = array();

        foreach($paragraphs as $p) {
            $newP = array(
              "text" => $p['text'][$lang],
              "treatments" => array(),
              "scrolled" => false,
              "title" => $p['title'][$lang]
            );

            foreach($p['treatments'] as $t) {
                $newT = array(
                   "code" => $t['name'],
                   "restrictive" => $t['restrictive'],
                   "mandatory" => $t['mandatory'],
                   "text" => $t['text'][$lang],
                   "selected" => false
                );

                $newP['treatments'][] = $newT;
            }
            $termResponse[] = $newP;
        }

        $js = $this->toJson($termResponse);

        return $response->withJson(
            array(
                "ownerId" => $ownerId,
                "termId" => $termId,
                "paragraphs" => $js
            )
        );
    }

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     */
    public function savePrivacy($request, $response, $args) {
        $ownerId = $request->getHeader('OwnerId')[0];
        $body = $request->getParsedBody();

        $ip = $this->getIp();
        $domain = $body['domain'];
        $email = $body['email'];
        $name = $body['name'];
        $surname = $body['surname'];

        $site = $body['site'];
        $privacy = $body['privacy'];
        $id = $body['id'];
        $termId = $body['termId'];
        $form = $body['form'];
        $privacyFlags = $body['privacyFlags'];
        $telephone = $body['telephone'];

        /**
         * @var EntityManager $em
         */
        $em = $this->getEmPrivacy($ownerId);

        $privacyEntry = new Privacy();

        $privacyEntry
            ->setCreated( new DateTime())
            ->setIp($ip)
            ->setForm($form)
            ->setName($name)
            ->setSurname($surname)
            ->setTermId($termId)
            ->setSite($site)
            ->setPrivacy($privacy)
            ->setId($id)//
            ->setDomain($domain)
            ->setEmail($email)
            ->setPrivacyFlags($privacyFlags)
            ->setTelephone($telephone)
        ;

        try{
            $em->merge($privacyEntry);
            $em->flush();
        } catch (Exception $e) {

            $r = $this->toJson($privacyEntry);
            echo($e->getMessage());

            // print_r($r);
            die;
        }

        return $response->withJson($this->success()) ;
    }


}
