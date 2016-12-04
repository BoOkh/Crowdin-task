<?php
namespace App\Core;

class App
{
    protected static $container = [];

    public static function bind($key, $value)
    {
        static::$container[$key] = $value;
    }

    public static function get($key)
    {
        if(array_key_exists($key, static::$container)) {
            return static::$container[$key];
        }

        throw new Exception('Key does not exist in the container');
    }
}