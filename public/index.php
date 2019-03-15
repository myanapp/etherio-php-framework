<?php

/**
 * ETHERIO PHP FRAMEWORK - Development for personal PHP Coding Experience...
 * @copyright  2019, Ethereal.
 * @author Shin Maung Maung <ethereal97@gmail.com>
 */

error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('display_start_up_errors', true);
ini_set('html_errors', false);

$server = require_once __DIR__ . '/../app/autoload.php';

$dbname = 'da5mp219si4bfv';
$username = 'otjeumaqejyauk';
$password = '647ddb59dfa2a0549add230481405146f89511eb6cca74991db6e6e8a45e82e5';

$db = new PDO('pgsql:host=ezc2-50-19-109-120.compute-1.amazonaws.com:5432;dbname=da5mp219si4bfv', $username, $password, '');

print_r($db);