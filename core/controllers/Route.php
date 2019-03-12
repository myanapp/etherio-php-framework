<?php

class Route
{
    public static $uri;
    public static $method;
    public static $routes = array();
    public static function get($path, $method)
    {
        self::$routes['GET'][$path] = $method;
    }

    public static function post($path, $method)
    {
        self::$routes['POST'][$path] = $method;
    }

    public static function api($path, $method)
    {
        self::$routes['API'][$path] = $method;
    }
}
