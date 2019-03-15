<?php

/**
 * ETHERIO PHP FRAMEWORK - Development for personal PHP Coding Experience...
 * @copyright  2019, Ethereal.
 * @author Shin Maung Maung <ethereal97@gmail.com>
 */

define('DOCUMENT_ROOT', __DIR__ . '/' . $_CONFIG['PUBLIC:DIR']);
define('SOURCE_DIR', __DIR__ . '/' . $_CONFIG['SOURCE:DIR']);
define('BUILD_DIR', __DIR__ . '/' . $_CONFIG['BUILD:CONFIGS']);
define('APP_DIR', __DIR__ . '/' . $_CONFIG['APP:CONFIGS']);

$_SERVER['PATH_INFO'] = urldecode(
    rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), DIRECTORY_SEPARATOR)
);

$_SERVER['PATH_INFO'] = empty($_SERVER['PATH_INFO']) ? '/' : $_SERVER['PATH_INFO'];

require_once BUILD_DIR['directory.name'] . '/function.php';

report_errors(E_ALL);

import_all('0', BUILD_DIR['directory.name']);
import_all('1');
import_all('7');