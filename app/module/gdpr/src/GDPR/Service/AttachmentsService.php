<?php
/**
 * Created by PhpStorm.
 * User: mauro.larese
 * Date: 17/08/2018
 * Time: 11:58
 */

namespace GDPR\Service;


use GDPR\Helpers\StringTemplate\Engine;
use function is_array;
use function md5;
use Slim\Http\UploadedFile;

class AttachmentsService {
    private $container;

    /**
     * AttachmentsService constructor.
     *
     * @param $container
     */
    public function __construct($container) { $this->container = $container; }

    public function savePrivacyAttachments($files, $ownerId, $privacyId) {
        if(!is_array($files)) $files=[$files];

        $settings = $this->container->get('settings');
        $attachmentPath = $settings['attachments'] ['users'] ['path'];
        /** @var Engine $stringTemplate */
        $stringTemplate = $this->container->get('string_template');
        $attachmentsPath = $stringTemplate->render($stringTemplate, ['ownerId'=>$ownerId, 'privacyId' => $privacyId]);

        /** @var UploadedFile $file */
        foreach ($files as $file) {
            $fileParts = pathinfo($file->getClientFilename());

            $name = $fileParts['filename'];
            $extension = $fileParts['extension'];
            $name = md5($name);

            $newFile = "$attachmentsPath/$name.$extension";
            $file->moveTo($newFile);
        }
    }
    public function savePrivacyAttachment(UploadedFile $file, $ownerId, $privacyId) {
        $file->getClientFilename();
        $file->file;
    }
}
