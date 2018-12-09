<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 9/21/18
 * Time: 10:24 AM
 */

namespace GDPR\Action;


use GDPR\Entity\Config\Properties;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\ResultSetMapping;
use Exception;
use function json_decode;
use Slim\Http\Request;
use Slim\Http\Response;

class Bi extends AbstractAction
{
    public function ownerPing (Request $request, Response $response, $args) {

        try {
            $em =$this->getEmConfig();
            $rep =$em->getRepository(Privacy::class);
            $privacy = $rep->findBy();
            return $response->withJson($this->toJson($privacy));


        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error searching owners');
        }
    }

    public function ownerPrivacy (Request $request, Response $response, $args) {

        try {
            $id = $args['id'];
            $privacy = $this->getEmConfig();
            $privacy->getRepository(Privacy::class)->find($id);
            return $response->withJson( $this->toJson($privacy));

        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error searching owners');
        }

    }

    public function ownerPrivacies (Request $request, Response $response, $args) {

        try {
            $em =$this->getEmConfig();
            $rep =$em->getRepository(Privacy::class);
            $privacy = $rep->findBy();
            return $response->withJson($this->toJson($privacy));

        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error searching owners');
        }

    }

    public function ownerPrivacyAdd (Request $request, Response $response, $args) {

        try {
            $body = $request->getParsedBody();

            $this->getEmConfig()->persist();
            $this->getEmConfig()->flush();

        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Missing Parameter');
        }

    }

    public function ownerVerifyFlags (Request $request, Response $response, $args) {

        try {
            $id = $args['id'];
            $privacy = $this->getEmConfig();
            $privacy->getRepository(Privacy::class)->find($id);
            return $response->withJson( $this->toJson($privacy));

        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error searching owners');
        }

    }

    public function ownerProfile (Request $request, Response $response, $args) {

        try {
            $id = $args['id'];
            $privacy = $this->getEmConfig();
            $privacy->getRepository(Privacy::class)->find($id);
            return $response->withJson( $this->toJson($privacy));

        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error searching owners');
        }

    }

    public function ownerSearch (Request $request, Response $response, $args) {

        try {
            $body = $request->getParsedBody();

            $this->getEmConfig()->persist();
            $this->getEmConfig()->flush();

        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Missing Parameter');
        }

    }

    public function ownerSearchCollection (Request $request, Response $response, $args) {

        try {
            $id = $args['id'];
            $privacy = $this->getEmConfig();
            $privacy->getRepository(Privacy::class)->find($id);
            return $response->withJson( $this->toJson($privacy));

        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error searching owners');
        }

    }

    public function ownerSaveCollection (Request $request, Response $response, $args) {

        try {

        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error searching owners');
        }

    }


    public function retrieveDimensions (Request $request, Response $response, $args) {

        try {
            if (isset($args['ownerId']))
                $ownerId = $args['ownerId'];
            else
                $ownerId = $this->getOwnerId($request);
            /** @var EntityManager $em */
            $em = $this->getEmBi($ownerId);
            $rsm = new ResultSetMapping();
            $rsm->addScalarResult('code', 'code');
            $rsm->addScalarResult('data', 'data');
            $query = $em->createNativeQuery('SELECT code, data FROM dimensions', $rsm);
            $result = $query->getResult();
            // die("done $ownerId");
            foreach ($result as &$record) {
                $record['data'] = json_decode($record['data']);
            }
            return $response->withJson($result);
        } catch (Exception $e) {
            echo $e->getMessage();

            return $response->withStatus(500, 'Error retriving data');
        }
    }

}
