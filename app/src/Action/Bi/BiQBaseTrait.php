<?php
namespace App\Action\Bi;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\ResultSetMapping;
use Slim\Http\Request;

trait BiQBaseTrait{

    /**
     {
        "filter":{},
        "pagination": {"page": 0,"records":0}
     }
     */

    use BiBase;

    public function getBiBaseCountries (EntityManager $em, $portalCode, $structureId, $portalId = 1) {
        $sql = "
            SELECT  count(country) AS items, country, country_iso2
            FROM abs_datamart.dm_reservation_$portalCode dm
            WHERE dm.portal_uid = '$portalCode-$portalId' AND dm.structure_uid = '$portalCode-$structureId' and  dm.opened_year >= '2016'
            GROUP BY country ORDER BY count(country) desc,country
        ";

        $rsm = $rsm = new ResultSetMapping();
        $rsm->addScalarResult('country', 'country');
        $rsm->addScalarResult('country_iso2', 'country_iso2');

        $query = $em->createNativeQuery($sql, $rsm);
        return $query->getResult();

    }

    public function getBiBaseCities (EntityManager $em, $portalCode, $structureId, $portalId = 1) {
        $sql = "
            SELECT distinct reservation_city as city 
              FROM abs_datamart.dm_reservation_res dm
                   LEFT JOIN abs_datawarehouse.fact_reservation_res AS fact ON dm.sync_code = fact.related_sync_code
                   LEFT JOIN abs_datawarehouse.raw_reservation_res AS raw ON fact.related_reservation_code = raw.sync_code
             WHERE 
                dm.structure_uid = '$portalCode-$structureId' and  dm.opened_year >= '2016'
                    
            ORDER BY  reservation_city 
        ";

        $rsm = $rsm = new ResultSetMapping();
        $rsm->addScalarResult('city', 'city');

        $query = $em->createNativeQuery($sql, $rsm);
        return $query->getResult();
    }

    private function buildWhere_filter_in ($fieldName, $queryConfig, $dbName = 'dm') {
        if(!isset($queryConfig["filter"][$fieldName])) return "";
        $filter = $queryConfig["filter"];
        $result = "";
        if( isset($filter[$fieldName]) && count($filter[$fieldName])>0 ){
            $result =  " and $dbName.$fieldName IN ('".implode("','", $filter[$fieldName])."')";
        }
        return $result;
    }

    private function getResponseQBaseData(EntityManager $em, $portalCode, $structureId, $portalId = 1, $queryConfig=[]) {
        $sqlCasePaxType = $this->sqlCasePaxtype;
        $sqlCaseOrigin = $this->sqlCaseOrigin;
        $sqlCaseOpenedMonth = $this->sqlCaseOpenedMonth;

        $whereCountry =  $this->buildWhere_filter_in("country_iso2",$queryConfig);
        $wherePax =  $this->buildWhere_filter_in("paxtype",$queryConfig);
        $whereCity =  $this->buildWhere_filter_in("reservation_city",$queryConfig);

        $sql = "
            SELECT  
                'reservation' as product
                ,reservation_origin as origin           
                ,country  
                ,country_iso2  
                ,reservation_city as city
                ,dm.paxtype
                ,dm.checkin_date as checkin
                ,dm.checkout_date as checkout
                ,dm.nights 
                ,reservation_name as name
                ,reservation_surname as surname
                ,reservation_email as email
              FROM abs_datamart.dm_reservation_res dm
                   LEFT JOIN abs_datawarehouse.fact_reservation_res AS fact
                      ON dm.sync_code = fact.related_sync_code
                   LEFT JOIN abs_datawarehouse.raw_reservation_res AS raw
                      ON fact.related_reservation_code = raw.sync_code
             WHERE 
                dm.structure_uid = '$portalCode-$structureId'
                and  dm.opened_year >= '2016'
                $whereCountry
                $wherePax
                $whereCity
                    
            ORDER BY 
            dm.sync_code, dm.opened_year, dm.paxtype, reservation_origin
            limit 0,1000
        ";

        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('product', 'product');
        $rsm->addScalarResult('origin', 'origin');
        $rsm->addScalarResult('country', 'country');
        $rsm->addScalarResult('city', 'city');
        $rsm->addScalarResult('country_iso2', 'country_iso2');
        $rsm->addScalarResult('paxtype', 'paxtype');
        $rsm->addScalarResult('checkin', 'checkin');
        $rsm->addScalarResult('checkout', 'checkout');
        $rsm->addScalarResult('nights', 'nights');
        $rsm->addScalarResult('name', 'name');
        $rsm->addScalarResult('surname', 'surname', 'string');
        $rsm->addScalarResult('email', 'email');

        $query = $em->createNativeQuery($sql, $rsm);
        return $query->getResult();
    }

    /**
     * @param $structure
     * @param $emDirectBi
     * @param $request Request
     *
     * @return mixed
     */
    private function biResponseQBase ($structure, $emDirectBi, $request) {
        $queryConfig = $request->getParsedBody();

        $biResponse = [];
        $biResponse['structure'] = $structure;
        $biResponse['countries'] = $this->getBiBaseCountries(
            $emDirectBi,
            $structure['portal_code'],
            $structure['structure_id'],
            $structure['portal_id']
        );
        // $biResponse['cities'] = $this->getBiBaseCities(
        //     $emDirectBi,
        //     $structure['portal_code'],
        //     $structure['structure_id'],
        //     $structure['portal_id']
        // );
        $biResponse['qbase'] = $this->getResponseQBaseData(
            $emDirectBi,
            $structure['portal_code'],
            $structure['structure_id'],
            $structure['portal_id'],
            $queryConfig
        );
        return $biResponse;
    }
}
