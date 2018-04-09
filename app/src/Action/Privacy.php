<?php
/**
 * Created by PhpStorm.
 * User: mauroadmin
 * Date: 08/04/18
 * Time: 12:39
 */

namespace App\Action;


use App\Entity\Privacy\Term;
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
        $ownerId = $args['ownerId'];
        $termId = $args['termId'];
        $lang = $args['lang'];

        /**
         * @var Term $term
         */
        $term = $this->getEmPrivacy($ownerId)->find(Term::class, $termId);
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


        $js = $this->toJson($termResponse);


        return $response->withJson(array("paragraphs" => $js));

    }
}