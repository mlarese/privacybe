<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 9/21/18
 * Time: 10:24 AM
 */

namespace App\Action;


use App\Entity\Config\Properties;
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

    private function getStructures(EntityManager $em, $ownerId ) {
        $sql = "
            SELECT * FROM abs_datawarehouse.sys_owners_map where owner_id = $ownerId and active = 1;
        ";

        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('portal_code', 'portal_code');
        $rsm->addScalarResult('structure_id', 'structure_id');
        $rsm->addScalarResult('portal_id', 'portal_id');

        $query = $em->createNativeQuery($sql, $rsm);
        return $query->getResult();
    }
    private function getDimPaxTypeSerOrigin(EntityManager $em, $portalCode, $structureId, $portalId = 1) {
        $sql = "
            SELECT  count(*) AS items,
                dm.opened_year AS filter,
                sum(dm.price) AS value,
                dm.paxtype AS dimension,
                reservation_origin AS serie
            FROM abs_datamart.dm_reservation_$portalCode dm
            LEFT JOIN abs_datawarehouse.fact_reservation_$portalCode AS fact ON dm.sync_code = fact.related_sync_code
            LEFT JOIN abs_datawarehouse.raw_reservation_$portalCode AS raw ON fact.related_reservation_code = raw.sync_code
            WHERE dm.portal_uid = '$portalCode-$portalId' AND dm.structure_uid = '$portalCode-$structureId' and  dm.opened_year >= '2014'
            GROUP BY dm.opened_year, reservation_origin, dm.paxtype 
            ORDER BY dm.opened_year, reservation_origin, dm.paxtype
        ";

        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('items', 'items');
        $rsm->addScalarResult('filter', 'filter');
        $rsm->addScalarResult('value', 'value');
        $rsm->addScalarResult('dimension', 'dimension');
        $rsm->addScalarResult('serie', 'serie');

        $query = $em->createNativeQuery($sql, $rsm);
        return $query->getResult();
    }

    public function retrieveDatamart (Request $request, Response $response, $args) {

        try {
            /** @var EntityManager $emDirectBi */
            $emDirectBi = $this->getContainer()->get('em-bi');
            $result = $this->getDimPaxTypeSerOrigin($emDirectBi,'res', '36',1);
            return $response->withJson($result);

        } catch (Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error retriving data');
        }
    }
}
