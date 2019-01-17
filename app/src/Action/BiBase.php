<?php
/**
 * Created by PhpStorm.
 * User: mauro.larese
 * Date: 17/01/2019
 * Time: 17:15
 */

namespace App\Action;


trait BiBase {
    public $sqlCasePaxtype = "
        CASE dm.paxtype
            WHEN 'Couples with child' THEN 'Families'
            WHEN 'Adult with child' THEN 'Families'
            WHEN 'Three Adults' THEN 'Families'
            WHEN 'Big family' THEN 'Families'
            ELSE dm.paxtype
        END  
    ";

    public $sqlCaseOrigin = "reservation_origin";
}
