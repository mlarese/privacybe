<?php
namespace App\Resource;


use App\Helpers\CsvExport;

class MailOneCsvExport  implements ICsvExport
{

    protected $name;

    protected $filename;

    protected $header;

    protected $data;

    public function __construct()
    {
        $this->header= array('name','surname','email','language');
    }


    public function setData($values)
    {
        $this->data =$values;
    }

    public function setHeader($values)
    {
        $this->header = $values;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setFilename($name)
    {
        $this->filename = $name;
    }

    public function saveFile()
    {

        $response = CsvExport::export($this->header,$this->data);

        if(!$this->filename || $this->filename ==''){
            $this->filename = $this->name . '.csv';
        }


        $file_mime = "text/plain";


        header( "Pragma: public" );
        header( "Expires: 0" );
        header( "Cache-Control: must-revalidate, post-check=0, pre-check=0" );
        header( "Cache-Control: private", false);
        header( "Content-Type: $file_mime" );
        header( "Content-Disposition: attachment; filename=\"" . $this->filename ."\"" );
        print $response;

        exit;

    }
}
