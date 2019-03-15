<?php

$_SERVER[PATH_INFO] = urldecode(
    rtrim(parse_url($_SERVER[REQUEST_URI], PHP_URL_PATH), DIRECTORY_SEPARATOR)
);

$_SERVER[PATH_INFO] = empty($_SERVER[PATH_INFO]) ? '/' : $_SERVER[PATH_INFO];
$_SERVER[SERVER_MODE] = isset($is_virtual) && $is_virtual ? 0 : 1;

return ksort($_SERVER);