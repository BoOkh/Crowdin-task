<?php

namespace App\Core;
/**
 * Class Request
 * @package App\Core
 */
class Request
{
    /**
     * <p>Get current URI</p>
     * @return string
     */
    public static function uri()
    {
        return trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'
        );
    }

    /**
     * Get http method(It's for Router)
     * @return mixed
     */
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}