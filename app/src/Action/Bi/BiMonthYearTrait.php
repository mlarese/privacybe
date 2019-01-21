<?php
namespace App\Action\Bi;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\ResultSetMapping;

trait BiMonthYearTrait {
    use BiBase;
    private function biResponseMonthYear ($structure, $emDirectBi) {

        $biResponse = [];
        $biResponse['structure'] = $structure;


        return $biResponse;
    }
}
