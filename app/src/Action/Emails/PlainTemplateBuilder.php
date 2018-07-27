<?php
/**
 * Created by PhpStorm.
 * User: mauro.larese
 * Date: 23/07/2018
 * Time: 14:46
 */

namespace App\Action\Emails;


use Exception;

class PlainTemplateBuilder {
    protected $templateName;

    /**
     * @return mixed
     */
    public function getTemplateName() {
        return $this->templateName;
    }

    /**
     * @param mixed $templateName
     */
    public function setTemplateName($templateName): void {
        $this->templateName = $templateName;
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

        if(!file_exists($tmpTpl))
            $tmpTpl = "templates/$templateName/en.php";
        if(!file_exists($tmpTpl))
            $tmpTpl = "templates/$templateName/it.php";


        $d = $data;

        ob_start();
        require($tmpTpl);
        $buffer = ob_get_contents();
        @ob_end_clean();
        return $buffer;
    }
}
