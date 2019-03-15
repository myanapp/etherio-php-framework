<?php

/**
 * ETHERIO PHP FRAMEWORK - Development for personal PHP Coding Experience...
 * @copyright  2019, Ethereal.
 * @author Shin Maung Maung <ethereal97@gmail.com>
 */

error_reporting($_GET['error'] ?? E_ERROR);
ini_set('display_errors', true);
ini_set('display_start_up_errors', true);
ini_set('html_errors', false);

$server = require_once __DIR__ . '/../app/autoload.php';

$db = parse_url(getenv("DATABASE_URL"));

$pdo = new PDO("pgsql:" . sprintf(
    "host=%s;port=%s;user=%s;password=%s;dbname=%s",
    $db["host"],
    $db["port"],
    $db["user"],
    $db["pass"],
    ltrim($db["path"], "/")
));


$db['user'] = '{{protected}}';
$db['pass'] = '{{protected}}';

$data[] = $pdo->prepare(urldecode($_GET['sql']) ?? '');
$data[] = $pdo->bindValue(urldecode($_GET['bind']) ?? '');
$data[] = $pdo->execute();

print_r(
    json_encode([$db, $pdo, $data], JSON_PRETTY_PRINT)
);