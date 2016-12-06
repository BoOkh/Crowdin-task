<?php
namespace App\Core;
/**
 * Class App
 * @package App\Core
 */
class App
{
    /**
     * @var array $container
     */
    protected static $container = [];

    /**
     * Bind data to container
     * @param $key
     * @param $value
     */
    public static function bind($key, $value)
    {
        static::$container[$key] = $value;
    }

    /**
     * Get data from container
     * @param $key
     * @return mixed
     */
    public static function get($key)
    {
        if(array_key_exists($key, static::$container)) {
            return static::$container[$key];
        }

        throw new Exception('Key does not exist in the container');
    }
}