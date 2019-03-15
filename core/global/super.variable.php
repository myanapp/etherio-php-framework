<?php
$_SERVER = array_merge($_ENV, $_SERVER);

// Setting Variable from ($env) settings...
$_SERVER[SERVER_ADMIN] = ER_SOURCE[WEBMASTER] ?? 'Webmaster <admin@webmaster.com>';

// URL - PATH_INFO
$_SERVER[PATH_INFO] = urldecode(
    rtrim(parse_url($_SERVER[REQUEST_URI], PHP_URL_PATH), DIRECTORY_SEPARATOR)
);
$_SERVER[PATH_INFO] = empty($_SERVER[PATH_INFO]) ? '/' : $_SERVER[PATH_INFO];

// Server Mode -> PHP Development Method (root), WebServer Mode (web)
$_SERVER[SERVER_ROOT] = isset($is_virtual) && $is_virtual ? 'root' : 'web';

ksort($_SERVER);
return $_ENV = $_SERVER;