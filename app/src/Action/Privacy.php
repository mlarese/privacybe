<?php
/**
 * Created by PhpStorm.
 * User: mauroadmin
 * Date: 08/04/18
 * Time: 12:39
 */

namespace App\Action;


class Privacy extends AbstractAction
{
    public function getWidgetTerm($request, $response, $args) {
        $term = $this->emPrivacy();

        return $response->withJson(['response'=>'$term']);

    }

}