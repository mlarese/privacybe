<?php
namespace App\Resource;


class MailOneDirectExportAdapter extends  AbstractAdapter implements IDirectExport
{


    /**
     * @var ICsvExport
     */
    protected $controller;

    public function __construct(ICsvExport $object = null)
    {
        $this->controller = $object;
    }

    public function setEndpoint($value)
    {
        $this->controller = $value;
    }

    public function setAction($action)
    {
        // Non serve
    }

    public function setSource($data)
    {
        $contacts = $data();


        $this->controller->setData($contacts);
    }

    public function setName($value)
    {
        $this->controller->setName($value);

    }

    public function setReplyEmail($email)
    {
        // Non serve
    }

    public function setEmail($email)
    {
        // Non serve
    }

    public function export()
    {
        $this->controller->saveFile();
    }
}
