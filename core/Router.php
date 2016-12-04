<?php
namespace App\Core;

class Router
{
    public $routes = [
      'GET' => [],
      'POST' => []
    ];
    public static function run($file)
    {
        $router = new Router;

        require $file;

        return $router;
    }

    public function get($uri, $path)
    {
        $this->routes['GET'][$uri] = $path;
    }

    public function post($uri, $path)
    {
        $this->routes['POST'][$uri] = $path;
    }

    public function determine($uri, $requestType)
    {
        $checkError = true;
        foreach ($this->routes[$requestType] as $uriPattern => $path)
        {
            if(preg_match("~^$uriPattern$~", $uri))
            {
                $internalPath = preg_replace("~^$uriPattern$~", $path, $uri);

                $components = explode('@', $internalPath);

                $controller = array_shift($components);

                $action = array_shift($components);

                $params = $components;

                $this->callAction($controller, $action, $params);
                $checkError = false;
                break;
            }
        }
        if ($checkError) {
            throw new Exception('Controller does not exist.');
        }
    }

    public function callAction($controller, $action, $params = [])
    {
        $controller = "App\Controllers\\".$controller;

        if(method_exists($controller, $action))
        {
            $controller = new $controller;
            $controller->$action(...$params);
        }
        else {
            throw new Exception('Method does not exist');
        }
    }
}