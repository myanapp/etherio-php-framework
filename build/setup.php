<?php

$isLocal = preg_match('!(localhost|127\.0\.0\/.1)!', $_SERVER['HTTP_HOST']) ? true : false;

ini_set('error_reporting', E_ERROR);
ini_set('display_start_up_errors', $isLocal);
ini_set('display_errors', $isLocal);
ini_set('html_errors', $isLocal);