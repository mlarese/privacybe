<?php
/**
 * Created by PhpStorm.
 * User: mauro.larese
 * Date: 23/07/2018
 * Time: 14:46
 */

namespace GDPR\Action\Emails;


use Exception;

class PlainTemplateBuilder {
    protected $templateName;

    /**
     * @return mixed
     */
    public function getTemplateName()
    {
        return $this->templateName;
    }

    /**
     * @param mixed $templateName
     * @return PlainTemplateBuilder
     */
    public function setTemplateName($templateName)
    {
        $this->templateName = $templateName;
        return $this;
    }


    /**
     * @param $data
     * @param $language
     *
     * @return string
     * @throws Exception
     */
    public function render ($data, $language) {
        if(!isset($this->templateName)) {
            throw new Exception('Templete name not setted');
        }
        $templateName = $this->templateName;

        $tmpTpl = "templates/$templateName/${language}.php";
        $tmpTplComplete = dirname(__FILE__)."/$tmpTpl";

        if(!file_exists($tmpTplComplete))
            $tmpTpl = "templates/$templateName/en.php";

        $tmpTplComplete = dirname(__FILE__)."/$tmpTpl";
        if(!file_exists($tmpTplComplete))
            $tmpTpl = "templates/$templateName/it.php";

        $d = $data;

        ob_start();
        require($tmpTpl);
        $buffer = ob_get_contents();
        @ob_end_clean();
        return $buffer;
    }
}
