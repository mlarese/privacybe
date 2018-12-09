<?php
/**
 * Created by PhpStorm.
 * User: mauro.larese
 * Date: 01/06/2018
 * Time: 10:36
 */

namespace GDPR\Resource\Privacy;

use GDPR\DoctrineEncrypt\Encryptors\EncryptorInterface;
use GDPR\Manager\ApplicationMiddleware;
use GDPR\Resource\IResultIntegrator;

class PrivacyRecordIntegrator implements IResultIntegrator {
    private $termPageMap;
    private $termMap;
    private $encryptor;

    /**
     * PrivacyRecordIntegrator constructor.
     * @param $termPageMap
     * @param $termMap
     */
    public function __construct($termPageMap, $termMap)
    {
        $this->termPageMap=$termPageMap;
        $this->termMap=$termMap;
        $appmdl = ApplicationMiddleware::getInstance();
        $app = $appmdl->getApp();
        $cont = $app->getContainer();

        /** @var EncryptorInterface encryptor */
        $this->encryptor = $cont->get('encryptor');


    }

    public function integrate(&$record) {
        /** @var IResultIntegrator $languageIntegrator */
        $languageIntegrator = new LanguageIntegrator();
        /** @var IResultIntegrator $generalDataIntegrator */
        $generalDataIntegrator = new GeneralDataIntegrator();
        $generalDataIntegrator->setEncryptor($this->encryptor);

        /** @var IResultIntegrator $treatmentsIntegrator */
        $treatmentsIntegrator = new TreatmentsIntegrator();
        /** @var IResultIntegrator $termIntegrator */
        $termIntegrator = new TermIntegrator($this->termPageMap, $this->termMap);

        $languageIntegrator->integrate($record);
        $generalDataIntegrator->integrate($record);
        $treatmentsIntegrator->integrate($record);
        $termIntegrator->integrate($record);
    }
}
