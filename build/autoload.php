<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '__condition.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '__function.php';

defined('__ROOT__') || define('__ROOT__', dirname(__DIR__) . DIRECTORY_SEPARATOR);

spl_autoload_register(function ($namespace) {
    $name = str_replace('\\', '/', $namespace);
    $file = basename($name) . '.php';
    $dir = strtolower(dirname($name));
    $path = $dir . DIRECTORY_SEPARATOR . $file;
    $path = required(__DIR__, $path) ? required(APP_MODL_DIR, $file) : false;
    if ($path) $path = required(APP_CTRL_DIR, $file) ? required(APP_VIEW_DIR, $file) : false;
    if ($path) die('<b>FatalError</b> on '.$path);
});

return require_once __APP__ . '/app.php';