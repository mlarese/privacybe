<?php
namespace App\Action;

use App\Entity\Privacy\PrivacyEntry;
use App\Entity\Privacy\Term;
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
        $ownerId = $request->getHeader('OwnerId')[0];
        $termId = $request->getHeader('TermId')[0];
        $lang = $request->getHeader('Language')[0];

        /**
         * @var EntityManager $em
         */
        $em = $this->getEmPrivacy($ownerId);

        /**
         * @var Term $term
         */

        $term = null;
        try {
            $term =  $em->find(Term::class, $termId);
        } catch(\Exception $e) {
            echo $e->getMessage();
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
                    "selecteed" => false

                );

                $newP['treatments'][] = $newT;
            }
            $termResponse[] = $newP;
        }

        echo '<pre>';
        print_r($_SERVER);
        die('');
        $js = $this->toJson($termResponse);

        return $response->withJson(array("paragraphs" => $js));
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