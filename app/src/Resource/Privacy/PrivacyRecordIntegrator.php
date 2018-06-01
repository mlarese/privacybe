<?php
/**
 * Created by PhpStorm.
 * User: mauro.larese
 * Date: 01/06/2018
 * Time: 10:36
 */

namespace App\Resource\Privacy;

use App\Resource\IResultIntegrator;

class PrivacyRecordIntegrator implements IResultIntegrator {
    private $termPageMap;
    private $termMap;

    /**
     * PrivacyRecordIntegrator constructor.
     * @param $termPageMap
     * @param $termMap
     */
    public function __construct($termPageMap, $termMap)
    {
        $this->termPageMap=$termPageMap;
        $this->termMap=$termMap;
    }

    public function integrate(&$record) {
        $languageIntegrator = new LanguageIntegrator();
        $generalDataIntegrator = new GeneralDataIntegrator();
        $treatmentsIntegrator = new TreatmentsIntegrator();
        $termIntegrator = new TermIntegrator($this->termPageMap, $this->termMap);
    }
}
