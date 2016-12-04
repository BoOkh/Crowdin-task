<?php
namespace App\Core;

class View
{
    /**
     * @var string the page title
     */
    public $title;

    /**
     * @var string the page meta description
     */
    public $metaDescription;

    public function dividePartial($template, $data = [])
    {
        extract($data);
        ob_start();
        include VIEWS_BASEDIR . $template . '.php';
        return ob_get_clean();
    }
    public function divide($template, $data = [])
    {
        $content = $this->dividePartial($template, $data);
        return $this->dividePartial(Controller::$layout, compact('content'));
    }

    public function render($template, $data = [])
    {
        echo $this->divide($template, $data);
    }
}