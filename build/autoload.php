<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'functions.php';

spl_autoload_register(function ($namespace) {
    $name = str_replace('\\', '/', $namespace);
    $file = basename($name) . '.php';
    $dir = strtolower(dirname($name));
    $path = $dir . DIRECTORY_SEPARATOR . $file;
    $path = required(__DIR__, $path) ? required(APP_MODL_DIR, $file) : false;
    if ($path) {
        $path = required(APP_CTRL_DIR, $file) ? required(APP_VIEW_DIR, $file) : false;
    }
    if ($path) {
        die('<b>FatalError</b> on ' . $path);
    }
});
