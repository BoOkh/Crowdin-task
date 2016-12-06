<?php
namespace App\Core;

/**
 * Class View
 * @package App\Core
 */
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

    /**
     * <p>Divide partial</p>
     * @param $template
     * @param array $data
     * @return string
     */
    public function dividePartial($template, $data = [])
    {
        extract($data);
        ob_start();
        include VIEWS_BASEDIR . $template . '.php';
        return ob_get_clean();
    }

    /**
     * <p>Divide page on layout and pages</p>
     * @param $template
     * @param array $data
     * @return string
     */
    public function divide($template, $data = [])
    {
        $content = $this->dividePartial($template, $data);
        return $this->dividePartial(Controller::$layout, compact('content'));
    }

    /**
     * Render template
     * @param $template
     * @param array $data
     */
    public function render($template, $data = [])
    {
        echo $this->divide($template, $data);
    }
}