<?php
namespace App\Action;

use App\Base\BaseAction;
use App\Entity\Privacy\PrivacyAttachment;
use App\Resource\InvalidAttachmentException;
use App\Resource\FileNotFoundException;
use function is_string;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Traits\UrlHelpers;

/**
 *
 * @author jeff
 *        
 */
class AttachmentView extends BaseAction
{
    
    use UrlHelpers;

    /**
     *
     * {@inheritdoc}
     * @see \App\Base\BaseAction::clazz()
     */
    public function clazz()
    {
        return PrivacyAttachment::class;
    }

    /**
     *
     * {@inheritdoc}
     * @see \App\Base\BaseAction::baseParams()
     */
    public function baseParams()
    {
        return [];
    }

    /**
     *
     * {@inheritdoc}
     * @see \App\Base\BaseAction::mandatoryFields()
     */
    public function mandatoryFields()
    {
        return [];
    }

    /**
     *
     * {@inheritdoc}
     * @see \App\Base\BaseAction::beforeGetById()
     */
    public function beforeGetById($params)
    {
        $fname = $args['fname'];
        
        $fname = $this->urlB64DecodeString($fname);
        
        $matches = [];
        
        if ($fname === false) {
            throw new InvalidAttachmentException();
        }
        
        $ftype = explode('.', $fname);
        
        if (! $ftype || empty($ftype)) {
            throw new InvalidAttachmentException();
        }
        
        $params['foname'] = $fname;
        
        $params['fname'] = md5($fname);
        
        $params['ftype'] = $ftype;
        
        $settings = $this->container->get('settings');
        
        if (! isset($settings['attachments']) || ! isset($settings['attachments']['users']) || ! isset($settings['attachments']['users']['spf_path'])) {
            
            throw new \Exception("Attachment path not configured");
        }
        
        $params['path'] = $settings['attachments']['users']['spf_path'];
    }

    /**
     *
     * {@inheritdoc}
     * @see \App\Base\BaseAction::afterGetById()
     */
    public function afterGetById(&$record, $args)
    {
        if ($record === null) {}
    }

    /**
     *
     * @param array $params
     * @throws FileNotFoundException
     * @return string
     */
    public function findBy($params = [])
    {
        $fname = $params['fname'];
        
        $ownerId = $this->getOwnerId($request);
        
        $privacyId = $params['uid'];
        
        $ftype = $params['ftype'];
        
        $filename = sprintf($params['path'], $ownerId, $privacyId) . '/' . $fname . $ftype;
        
        $params['filename'] = $filename;
        
        $file = file_get_contents($filename);
        
        if ($file === false)
            throw new FileNotFoundException();
        
        return $file;
    }

    public function generateResponse($file, Request $request, Response $response, $args)
    {
        $response = $response->withAddedHeader('Cache-Control', 'no-cache, must-revalidate');
        
        $response = $response->withAddedHeader('Expires', 'Sat, 26 Jul 1997 05:00:00 GMT');
        
        $response = $response->withHeader('Content-type', 'application/octet-stream')
            ->withHeader('Content-Disposition', 'attachment; filename=' . $args['foname'])
            ->withHeader('Content-Transfer-Encoding', 'binary')
            ->withHeader('Expires', '0')
            ->withHeader('Cache-Control', 'must-revalidate')
            ->withHeader('Pragma', 'public')
            ->withHeader('Content-Length', filesize($args['filename']))
            ->withBody($file);
        
        return $response;
    }

    /**
     *
     * {@inheritdoc}
     * @see \App\Base\BaseAction::getById()
     */
    public function getById(Request $request, Response $response, $args)
    {
        try {
            $this->setActionParams($request, $response, $args);
            $this->injectEntityManager();
            $this->beforeGetById($args);
            $record = $this->findOneBy($args);
            $this->afterGetById($record, $args);
            $response = $this->generateResponse($record, $request, $response, $args);
            return $response;
        } catch (\Exception $e) {
            echo $e->getMessage();
            return $response->withStatus(500, 'Error finding records');
        }
    }

    /**
     *
     * {@inheritdoc}
     * @see \App\Base\BaseAction::get()
     */
    public function get(Request $request, Response $response, $args)
    {
        return $response->withStatus(501, 'Not Implemented');
    }

    /**
     *
     * {@inheritdoc}
     * @see \App\Base\BaseAction::post()
     */
    public function post(Request $request, Response $response, $args)
    {
        return $response->withStatus(501, 'Not Implemented');
    }

    /**
     *
     * {@inheritdoc}
     * @see \App\Base\BaseAction::put()
     */
    public function put(Request $request, Response $response, $args)
    {
        return $response->withStatus(501, 'Not Implemented');
    }

    /**
     *
     * {@inheritdoc}
     * @see \App\Base\BaseAction::delete()
     */
    public function delete(Request $request, Response $response, $args)
    {
        return $response->withStatus(501, 'Not Implemented');
    }
}
