<?php
namespace App\Action\Bi;


use App\Resource\Privacy\GroupByEmail;
use App\Resource\PrivacyResource;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\ResultSetMapping;
use function print_r;
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
    }

    private function filterByPrivacy (&$data, $criteria, $privacyEm ) {

        $priRes = new PrivacyResource($privacyEm);
        $list = $priRes->privacyListIds($criteria, new GroupByEmail());

        return $list;
    }


    /**
     * @param EntityManager $em
     * @param               $portalCode
     * @param               $structureId
     * @param int           $portalId
     * @param array         $queryConfig
     *
     * @return array
     *
     {
        "dirty": false,
        "time_range_type": "months",
        "product": [ "reservation"  ],
        "origin": [  "C", "D",  "G"   ],
        "channel": [],
        "nationality": [ "Albania", "Algeria"  ],
        "paxtype": [  "Adult with child",  "Couples" ],
        "checkin_from": "2019-04-30T22:00:00.000Z",
        "checkin_to": "2019-05-02T22:00:00.000Z",
        "time_range_value": "1"
     }
     *
     */
    private function getResponseQBaseData(EntityManager $em, EntityManager $privacyEm, $portalCode, $structureId, $portalId = 1, $queryConfig=[]) {
        $sqlCasePaxType = $this->sqlCasePaxtype;
        $sqlCaseOrigin = $this->sqlCaseOrigin;
        $sqlCaseOpenedMonth = $this->sqlCaseOpenedMonth;

        $whereCountry =  $this->buildWhere_filter_in("country_iso2",$queryConfig);
        $wherePax =  $this->buildWhere_filter_in("paxtype",$queryConfig);
        $whereCity =  $this->buildWhere_filter_in("reservation_city",$queryConfig);

        $sql = "
            SELECT 
               
               (select
                    GROUP_CONCAT(DISTINCT  DATE_FORMAT(reservation_opened_date,'%d/%m/%y')  ORDER BY reservation_opened_date DESC SEPARATOR ' - ') 
                    from abs_datawarehouse.raw_reservation_$portalCode as raw2 
                    where raw2.reservation_email=raw.reservation_email
                    and reservation_deleted = 0
               ) as return_dates,
               count(*), 
               raw.sync_code,
               reservation_email AS email,
               'reservation' AS product,
               reservation_origin AS origin,
               country,
               country_iso2,
               reservation_city AS city,
               dm.paxtype,
               dm.lead_time,
               dm.opened_date AS opened,
               dm.checkin_date AS checkin,
               dm.checkout_date AS checkout,
               dm.nights,
               reservation_name AS name,
               reservation_surname AS surname,
               reservation_number as code
               
          FROM abs_datamart.dm_reservation_$portalCode dm
          LEFT JOIN abs_datawarehouse.fact_reservation_$portalCode AS fact ON dm.sync_code = fact.related_sync_code
          INNER JOIN abs_datawarehouse.raw_reservation_$portalCode AS raw  ON fact.related_reservation_code = raw.sync_code
          INNER JOIN 
            (
              select max(sync_code) as sync_code 
              from abs_datawarehouse.raw_reservation_$portalCode 
              group by reservation_email order by reservation_email
            ) AS raw1  
            ON fact.related_reservation_code = raw1.sync_code          
         WHERE 
            dm.structure_uid = '$portalCode-$structureId' 
            AND dm.opened_year >= '2016'
            $whereCountry
            $wherePax
            $whereCity   
         
         group by reservation_email
         
        ORDER BY 
                reservation_email,
                dm.checkin_date,
                dm.checkout_date,
                dm.sync_code,
                dm.opened_year,
                dm.paxtype,
                reservation_origin

        ";

        // die("$sql");
        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('product', 'product');
        $rsm->addScalarResult('origin', 'origin');
        $rsm->addScalarResult('country', 'country');
        $rsm->addScalarResult('city', 'city');
        $rsm->addScalarResult('country_iso2', 'country_iso2');
        $rsm->addScalarResult('paxtype', 'paxtype');
        $rsm->addScalarResult('checkin', 'checkin');
        $rsm->addScalarResult('opened', 'opened');
        $rsm->addScalarResult('checkout', 'checkout');
        $rsm->addScalarResult('nights', 'nights');
        $rsm->addScalarResult('name', 'name');
        $rsm->addScalarResult('surname', 'surname', 'string');
        $rsm->addScalarResult('lead_time', 'leadtime', 'string');
        $rsm->addScalarResult('return_dates', 'return_dates', 'string');
        $rsm->addScalarResult('email', 'email');

        $query = $em->createNativeQuery($sql, $rsm);
        $result = $query->getResult();

        $r=$this->filterByPrivacy($result, $queryConfig,$privacyEm );

        return $result;
    }

    /**
     * @param $structure
     * @param $emDirectBi
     * @param $request Request
     *
     * @return mixed
     */
    private function biResponseQBase ($structure, $emDirectBi, $privacyEm, $request) {
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
            $privacyEm,
            $structure['portal_code'],
            $structure['structure_id'],
            $structure['portal_id'],
            $queryConfig
        );
        return $biResponse;
    }
}
