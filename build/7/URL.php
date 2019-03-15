<?php


class URL
{
    public function __construct($request_uri, $explode_uri)
    {
        $_SERVER[$request_uri] = urldecode(rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
        if (substr($_SERVER[$request_uri], 1, 4) === 'api') $_SERVER[$request_uri] = substr($_SERVER[$request_uri], 4);
        $_SERVER[$explode_uri] = explode('/', substr($_SERVER[$request_uri], 1));
    }

    static $arr_name;
    public static function format(string ...$name)
    {
        self::$arr_name = $name;
    }

    public static function get(int $max = 1)
    {
        $path = $_SERVER['EXPLODE_URL'];
        if (count($path) < $max) return false;
        return $path[$max] ?? false;
    }
}