<?php
namespace App\Resource;


class MailUpDirectExportAdapter extends  AbstractAdapter implements IDirectExport
{


    /**
     * @var IDirectExport
     */
    protected $controller;



    public function __construct(IDirectExport $object = null)
    {

        $this->controller = $object;

    }

    public function setOwner($value)
    {

       $this->controller->setOwner($value);
    }

    public function setEndpoint($value)
    {
        $this->controller = $value;

    }


    public function setAction($action)
    {
        $this->controller->setAction($action);
    }

    public function setSource($data)
    {
        $contacts = $data();


        $this->controller->setSource($contacts);
    }

    public function setName($value)
    {
        $this->controller->setName($value);

    }

    public function setReplyEmail($email)
    {
        $this->controller->setReplyEmail($email);
    }

    public function setEmail($email)
    {
        $this->controller->setEmail($email);
    }

    public function export()
    {
       return $this->controller->export();
    }
}
