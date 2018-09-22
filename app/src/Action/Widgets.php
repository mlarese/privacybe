<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 9/21/18
 * Time: 7:00 PM
 */

namespace App\Action;


use App\Entity\Config\Widget;

class Widgets extends AbstractAction
{
    public function getAllWidgets(Request $request, Response $response, $args) {
        try {
            $em =$this->getEmConfig();
            $rep =$em->getRepository(Widget::class);
            $widget = $rep->findBy();
            return $response->withJson($this->toJson($widget));

        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error getting widget');
        }
    }

    public function getWidget(Request $request, Response $response, $args) {
        try {

            $id = $args['id'];
            $widget = $this->getEmConfig();
            $widget->getRepository(Widget::class)->find($id);
            return $response->withJson( $this->toJson($widget));


        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error getting widget');
        }
    }

    public function updateWidget(Request $request, Response $response, $args) {
        try {

        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error getting widget');
        }
    }

    public function insertWidget(Request $request, Response $response, $args) {
        try {
            $body = $request->getParsedBody();

            $this->getEmConfig()->persist();
            $this->getEmConfig()->flush();

        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error getting widget');
        }
    }

    public function widgetDelete(Request $request, Response $response, $args) {
        try {

        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error getting widget');
        }
    }

}
