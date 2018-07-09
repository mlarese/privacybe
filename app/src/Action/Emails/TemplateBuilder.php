<?php
/**
 * Created by PhpStorm.
 * User: mauro.larese
 * Date: 06/07/2018
 * Time: 12:06
 */

namespace App\Action\Emails;


class TemplateBuilder {
    private $templateName;
    private $data;
    private $language;

    /**
     * TemplateBuilder constructor.
     *
     * @param $templateName
     * @param $data
     * @param $labels
     */
    public function __construct($templateName, $data, $language) {
        $this->templateName = "templates/$templateName/${language}.php";
        $this->data = $data;
        $this->language = $language;
    }

    public function render () {
        $d = $this->data;

        ob_start();
        require($this->templateName);
        $buffer = ob_get_contents();
        @ob_end_clean();
        return $buffer;
    }

}
