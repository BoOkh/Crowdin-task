<?php
namespace App\Core;
/**
 * Class Controller
 * @package App\Core
 */
abstract class Controller
{
    /**
     * @var View
     */
    protected $view;
    /**
     * @var $layout
     */
    public static $layout;

    public function __construct()
    {
        $this->view = new View();
        static::$layout = 'layouts/default';
    }
}