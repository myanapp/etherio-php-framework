<?php

// if (!is_dir(ER_SOURCE)) die(ER_SOURCE . ' is not a directory...');
$mime = ER_ENV[MIME];

switch ($_SERVER[PATH_INFO]) {
    case '/':
        index();
        break;
    case '/favicon.ico':
        header('Content-Type: image/x-icon');
        echo file_get_contents(__ROOT__ . '/public/favicon.ico');
        break;
    default:
        path($mime, ER_SOURCE . '/404.html');
}

function index()
{
    http_response_code(200);
    header('Content-Type: text/html; charset=UTF-8');
    require_once ER_SOURCE . '/docs/index.html';
}

function path($mime, $error, $res = 200)
{
    $file = pathinfo($_SERVER[PATH_INFO]);
    $ext = $file[extension];
    $mime = $mime[$ext];
    $src = ER_SOURCE . $_SERVER[PATH_INFO];

    if (!is_file($src)) return error_404($src, $error);

    http_response_code($res);
    header("Content-Type: $mime; charset=UTF-8");
    require_once $src;
}

function error_404($path = 0, $src)
{
    http_response_code(404);
    if (!$path) $path = $_SERVER[PATH_INFO];
    if (is_file($src)) require_once $src;
    die;
}