<?php
namespace App\Core;
use Exception;
/**
 * Class Router
 * @package App\Core
 */
class Router
{
    /**
     * @var array $routes
     */
    public $routes = [
      'GET' => [],
      'POST' => []
    ];

    /**
     * Load routes
     * @param $file
     * @return Router
     */
    public static function run($file)
    {
        $router = new Router;

        require $file;

        return $router;
    }

    /**
     * Processing get method
     * @param $uri <p>current uri</p>
     * @param $path <p>Internal path(controller, action)</p>
     */
    public function get($uri, $path)
    {
        $this->routes['GET'][$uri] = $path;
    }

    /**
     * Processing post method
     * @param $uri <p>current uri</p>
     * @param $path <p>Internal path(controller, action)</p>
     */
    public function post($uri, $path)
    {
        $this->routes['POST'][$uri] = $path;
    }

    /**
     * Determine controller and action
     * @param $uri
     * @param $requestType
     */
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

    /**
     * Call action
     * @param $controller
     * @param $action
     * @param array $params
     */
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