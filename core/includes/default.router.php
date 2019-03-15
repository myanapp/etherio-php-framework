<?php

// if (!is_dir(ER_SOURCE)) die(ER_SOURCE . ' is not a directory...');
$mime = ER_ENV[MIME];

$_SERVER[PATH_INFO] === '/' ? index() : path($mime, ER_SOURCE . '/docs/404.html');

function index()
{ }

function path($mime, $error)
{
    $file = pathinfo($_SERVER[PATH_INFO]);
    $ext = $file[extension];
    $r = $mime[$ext];
    $src = ER_SOURCE . $r[1] . $_SERVER[PATH_INFO];

    if (!is_file($src)) error_404($src, $error);
}

function error_404($path = 0, $src)
{
    http_response_code(404);
    if (!$path) $path = $_SERVER[PATH_INFO];
    if (is_file($src)) require_once $src;
    die;
}