<?php

/**
 * ETHERIO PHP FRAMEWORK - Development for personal PHP Coding Experience...
 * @copyright  2019, Ethereal.
 * @author Shin Maung Maung <ethereal97@gmail.com>
 */

class Config
{
    static $storage = array();

    static function __callStatic($name, $arguments)
    {
        self::$storage[$name] = $arguments;
    }
}

Config::ROOT(__DIR__);

Config::ROOT(__DIR__);