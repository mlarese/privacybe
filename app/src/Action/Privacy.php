<?php
namespace App\Action;

use App\Entity\Config\Domain;
use App\Entity\Config\Page;
use App\Entity\Privacy\PrivacyEntry;
use App\Entity\Privacy\Term;
use App\Entity\Privacy\TermAsPage;
use DateTime;
use Doctrine\ORM\EntityManager;
use Exception;
use Slim\Http\Request;
use Slim\Http\Response;

class Privacy extends AbstractAction
{

    /**
     * @param $request Request
     * @param $response Response
     * @param $args
     * @return mixed
     */
    public function getWidgetTerm($request, $response, $args) {
        $lang = $request->getHeader('Language')[0];
        $pageName = $request->getHeader('Page')[0];
        $domainName = $request->getHeader('Domain')[0];

        /**
         * @var EntityManager $em
         */
        $cem = $this->getEmConfig();
        /**
         * @var Domain $domain
         */
        $domain= $cem->find(Domain::class, $domainName);


        If(!isset($domain)) {
            return $response->withStatus(403, "Domain $domainName not found");
        }

        $ownerId = $domain->getOwnerId();

        /**
         * @var EntityManager $em
         */
        $em = $this->getEmPrivacy($ownerId);

        /**
         * @var TermAsPage $termHasPage
         */
        $termHasPage = $em->
                            getRepository(TermAsPage::class)
                            ->findOneBy(array('domain' => $domainName, 'page' => $pageName));

        If(!isset($termHasPage)) {
            return $response->withStatus(403, "Page $domainName$pageName not found");
        }

        $termId = $termHasPage->getTermUid();
        /**
         * @var Terms $term
         */

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
              "scrolled" => false
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
        $termId = $request->getHeader('TermId')[0];

        $email = '';
        $form = '';
        $name = '';
        $surName = '';
        $site = '';
        $privacy = '';
        $id = '';

        /**
         * @var EntityManager $em
         */
        // $em = $this->getEmPrivacy($ownerId);

        $privacyEntry = new PrivacyEntry();

        $privacyEntry->setCreated( new DateTime())
            ->setEmail($email)
            ->setForm($form)
            ->setName($name)
            ->setSurname($surName)
            ->setTermId($termId)
            ->setSite($site)
            ->setPrivacy($privacy)
            ->setId($id)
        ;


    }
}