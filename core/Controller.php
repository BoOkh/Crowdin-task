<?php
namespace App\Core;

abstract class Controller
{
    protected $view;
    public static $layout;

    public function __construct()
    {
        $this->view = new View();
        static::$layout = 'layouts/default';
    }
}