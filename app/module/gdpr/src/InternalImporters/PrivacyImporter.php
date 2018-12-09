<?php
/**
 * Created by PhpStorm.
 * User: mauro.larese
 * Date: 14/06/2018
 * Time: 16:57
 */

namespace GDPR\InternalImporters;


use GDPR\Action\PrivacyManager;
use Exception;

class PrivacyImporter {
    private $csvFile;
    private $privacyResource;
    private $ownerId;
    private $errors;
    /**
     * PrivacyImporter constructor.
     *
     * @param $csvFile
     * @param $privacyResource
     * @param $ownerId
     */
    public function __construct($csvFile, $privacyResource, $ownerId) {
        $this->csvFile = $csvFile;
        $this->privacyResource = $privacyResource;
        $this->ownerId = $ownerId;
    }


    /**
     * @param $csv array
     */
    public function fromCsv($csv) {
        $this->errors=[];
        $count=0;
        foreach ($csv as $record) {
            try {
                $this->savePrivacy($record);
            } catch (Exception $e) {
                $this->errors[] = ['row'=>$count, "record"=>$record];
            }
            $count++;
        }
        return $this->errors;
    }

    private function savePrivacy($data) {
        $ip = '';
        if(isset($data['ip'])) {
            $ip = $data['ip'];
        }

        PrivacyManager::savePlainPrivacyByAssoc(
            $this->privacyResource,
            $data,
            $this->ownerId,
            $ip
        );
    }
}
