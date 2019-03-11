<?php

class Route {
    static $routes = array();
    static function get($path, $method) {
        self::$routes['GET'][$path] = $method;
    }
    
    static function post($path, $method) {
        self::$routes['POST'][$path] = $method;
    }

}