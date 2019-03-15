<?php

/**
 * =======================================================================
 * ETHERIO PHP FRAMEWORK - Development for personal PHP Coding Experience
 * =======================================================================
 * @copyright  2019, Ethereal.
 * @author Shin Maung Maung <ethereal97@gmail.com>
 * 
 */

error_reporting(E_ERROR & ~E_NOTICE);
ini_set('display_errors', true);
ini_set('display_start_up_errors', true);
ini_set('html_errors', true);

/** 
 *** Self-Initiate Function and Get Return Value ***
 * to perform like MOD_REWRITE_ON on LOCAL_DEV_ENV */

$is_virtual = (function (string $idx) {
    $regex = '/' . preg_quote($idx, '/') . '/'; //* create input_string into regular_expression
    foreach (get_included_files() as $ini) //* to filter all included_files before this sections
        if (preg_match($regex, $ini)) $index = 1; //* and search all match_case with input_string
    return isset($index) ? false : require_once __DIR__ . $idx; //* if there were input_string is_existed: return "FALSE"; or: require "input_string";
})('/public/index.php');


/** 
 *** Importing Required Modules ***
 */

$env = require_once __DIR__ . '/config.php';
$app = require_once __DIR__ . '/core/build.php';

echo '<pre>';
echo json_encode($_SERVER, JSON_PRETTY_PRINT);