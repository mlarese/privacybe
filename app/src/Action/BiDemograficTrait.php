<?php
/**
 * Created by PhpStorm.
 * User: mauro.larese
 * Date: 17/01/2019
 * Time: 17:09
 */

namespace App\Action;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\ResultSetMapping;

trait BiDemograficTrait{
    use BiBase;

    private function getDimMonthSerOriginFilterPaxType(EntityManager $em, $portalCode, $structureId, $portalId = 1, $addMonth = false) {
        $sqlCasePaxType = $this->sqlCasePaxtype;
        $sqlCaseOrigin = $this->sqlCaseOrigin;
        $sqlCaseOpenedMonth = $this->sqlCaseOpenedMonth;

        $sql = "
            SELECT  count(*) AS items,
                dm.opened_year AS filter,
                $sqlCaseOpenedMonth AS dimension,
                sum(dm.price) AS value,
                $sqlCasePaxType AS filter1,
                $sqlCaseOrigin AS serie
            FROM abs_datamart.dm_reservation_$portalCode dm
            LEFT JOIN abs_datawarehouse.fact_reservation_$portalCode AS fact ON dm.sync_code = fact.related_sync_code
            LEFT JOIN abs_datawarehouse.raw_reservation_$portalCode AS raw ON fact.related_reservation_code = raw.sync_code
            WHERE dm.portal_uid = '$portalCode-$portalId' AND dm.structure_uid = '$portalCode-$structureId' and  dm.opened_year >= '2016'
            GROUP BY dm.opened_year, dm.opened_month, reservation_origin, dm.paxtype 
            ORDER BY dm.opened_year, dm.opened_month, reservation_origin, dm.paxtype
        ";

        $rsm = $this->createBiResultsetMapping();
        $rsm->addScalarResult('filter1', 'filter1');

        $query = $em->createNativeQuery($sql, $rsm);
        return $query->getResult();
    }

    private function getDimMonthSerPaxTypeOriginFilterOrigin(EntityManager $em, $portalCode, $structureId, $portalId = 1, $addMonth = false) {
        $sqlCasePaxType = $this->sqlCasePaxtype;
        $sqlCaseOrigin = $this->sqlCaseOrigin;
        $sqlCaseOpenedMonth = $this->sqlCaseOpenedMonth;
        $sql = "
            SELECT  count(*) AS items,
                dm.opened_year AS filter,
                $sqlCaseOpenedMonth AS dimension,
                sum(dm.price) AS value,
                $sqlCasePaxType AS serie,
                $sqlCaseOrigin AS filter1
            FROM abs_datamart.dm_reservation_$portalCode dm
            LEFT JOIN abs_datawarehouse.fact_reservation_$portalCode AS fact ON dm.sync_code = fact.related_sync_code
            LEFT JOIN abs_datawarehouse.raw_reservation_$portalCode AS raw ON fact.related_reservation_code = raw.sync_code
            WHERE dm.portal_uid = '$portalCode-$portalId' AND dm.structure_uid = '$portalCode-$structureId' and  dm.opened_year >= '2016'
            GROUP BY dm.opened_year, dm.opened_month, reservation_origin, dm.paxtype 
            ORDER BY dm.opened_year, dm.opened_month, reservation_origin, dm.paxtype
        ";

        $rsm = $this->createBiResultsetMapping();
        $rsm->addScalarResult('filter1', 'filter1');

        $query = $em->createNativeQuery($sql, $rsm);
        return $query->getResult();
    }

    private function getDimPaxTypeSerOrigin(EntityManager $em, $portalCode, $structureId, $portalId = 1, $addMonth = false) {
        $sqlCasePaxType = $this->sqlCasePaxtype;
        $sqlCaseOrigin = $this->sqlCaseOrigin;

        $sql = "
            SELECT  count(*) AS items,
                dm.opened_year AS filter,
                sum(dm.price) AS value,
                $sqlCasePaxType AS dimension,
                $sqlCaseOrigin AS serie
            FROM abs_datamart.dm_reservation_$portalCode dm
            LEFT JOIN abs_datawarehouse.fact_reservation_$portalCode AS fact ON dm.sync_code = fact.related_sync_code
            LEFT JOIN abs_datawarehouse.raw_reservation_$portalCode AS raw ON fact.related_reservation_code = raw.sync_code
            WHERE dm.portal_uid = '$portalCode-$portalId' AND dm.structure_uid = '$portalCode-$structureId' and  dm.opened_year >= '2016'
            GROUP BY dm.opened_year, reservation_origin, dm.paxtype 
            ORDER BY dm.opened_year, reservation_origin, dm.paxtype
        ";

        $rsm = $this->createBiResultsetMapping();

        $query = $em->createNativeQuery($sql, $rsm);
        return $query->getResult();
    }
    private function createBiResultsetMapping ($dimensionType='string', $valueType='integer') {
        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('items', 'items', 'integer');
        $rsm->addScalarResult('filter', 'filter');
        $rsm->addScalarResult('value', 'value',$valueType);
        $rsm->addScalarResult('dimension', 'dimension', $dimensionType);
        $rsm->addScalarResult('serie', 'serie');

        return $rsm;
    }


    private function getDimOriginSerPaxType(EntityManager $em, $portalCode, $structureId, $portalId = 1) {
        $sqlCasePaxType = $this->sqlCasePaxtype;
        $sqlCaseOrigin = $this->sqlCaseOrigin;
        $sql = "
            SELECT  count(*) AS items,
                dm.opened_year AS filter,
                sum(dm.price) AS value, 
                $sqlCasePaxType AS serie,
                $sqlCaseOrigin AS dimension
                
            FROM abs_datamart.dm_reservation_$portalCode dm
            LEFT JOIN abs_datawarehouse.fact_reservation_$portalCode AS fact ON dm.sync_code = fact.related_sync_code
            LEFT JOIN abs_datawarehouse.raw_reservation_$portalCode AS raw ON fact.related_reservation_code = raw.sync_code
            WHERE dm.portal_uid = '$portalCode-$portalId' AND dm.structure_uid = '$portalCode-$structureId' and  dm.opened_year >= '2016'
            GROUP BY dm.opened_year,  dm.paxtype,reservation_origin 
            ORDER BY dm.opened_year,  dm.paxtype,reservation_origin
        ";

        $rsm = $this->createBiResultsetMapping();

        $query = $em->createNativeQuery($sql, $rsm);
        return $query->getResult();
    }
    private function biResponseDemografic ($structure, $emDirectBi) {

        $biResponse = [];
        $biResponse['structure'] = $structure;
        $biResponse['paxtype-origin'] = $this->getDimPaxTypeSerOrigin(
            $emDirectBi,
            $structure['portal_code'],
            $structure['structure_id'],
            $structure['portal_id']
        );

        $biResponse['origin-paxtype'] = $this->getDimOriginSerPaxType(
            $emDirectBi,
            $structure['portal_code'],
            $structure['structure_id'],
            $structure['portal_id']
        );

        $biResponse['month-paxtype-origin'] = $this->getDimMonthSerOriginFilterPaxType(
            $emDirectBi,
            $structure['portal_code'],
            $structure['structure_id'],
            $structure['portal_id']
        );

        $biResponse['month-origin-paxtype'] = $this->getDimMonthSerPaxTypeOriginFilterOrigin(
            $emDirectBi,
            $structure['portal_code'],
            $structure['structure_id'],
            $structure['portal_id']
        );

        return $biResponse;
    }

}
