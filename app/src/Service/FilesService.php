<?php
/**
 * Created by PhpStorm.
 * User: mauro.larese
 * Date: 09/09/2018
 * Time: 17:39
 */

namespace App\Service;


use function file_exists;
use function ftp_get;
use function md5;
use function mkdir;
use mysql_xdevapi\Exception;
use function pathinfo;
use Slim\Container;
use Slim\Http\UploadedFile;
use function sprintf;

class FilesService {
    /** @var Container */
    private $container;

    /**
     * FilesService constructor.
     *
     * @param Container $container
     */
    public function __construct(Container $container) { $this->container = $container; }

    public function downloadUserAttachment($fileName, $ownerId, $id) {
        $fileName = md5($fileName);
        $settings = $this->container->get('settings');
        $userAtt = $settings['attachments']['users'];

        $path = $userAtt['spf_path'];
        $path =sprintf($path, $ownerId,$id);

        $fileName = $path .'/'.$fileName;
    }
    public function saveUserAttachment(UploadedFile $file, $ownerId, $id) {
        $tmpFileName = $file->file;
        $fileName = $file->getClientFilename();
        $fileName = md5($fileName);
        $settings = $this->container->get('settings');
        $userAtt = $settings['attachments']['users'];

        $path = $userAtt['spf_path'];
        $path =sprintf($path, $ownerId,$id);

        if(!file_exists($path))
            mkdir($path,0777,true);

        $file->moveTo($path . '/'.$fileName);
    }



    public function buildPrivacyAttachmentFileName ($tmpFileName , $ownerId, $id) {

        $settings = $this->container->get('settings');
        $userAtt = $settings['attachments']['users'];

        $path = $userAtt['spf_path'];
        $path =sprintf($path, $ownerId,$id);

        return $path;
    }


}
