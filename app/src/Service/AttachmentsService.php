<?php
/**
 * Created by PhpStorm.
 * User: mauro.larese
 * Date: 17/08/2018
 * Time: 11:58
 */

namespace App\Service;


use Slim\Http\UploadedFile;

class AttachmentsService {
    private $container;

    /**
     * AttachmentsService constructor.
     *
     * @param $container
     */
    public function __construct($container) { $this->container = $container; }

    public function savePrivacyAttachment(UploadedFile $file, $ownerId, $privacyId) {
        $file->getClientFilename();
        $file->file;
    }
}
