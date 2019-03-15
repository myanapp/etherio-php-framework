<?php

/**
 * ETHERIO PHP FRAMEWORK - Development for personal PHP Coding Experience...
 * @copyright  2019, Ethereal.
 * @author Shin Maung Maung <ethereal97@gmail.com>
 */

require_once __DIR__ . '/build/dev/debugs.php';

if ($inc_c < 1) {
    require_once __DIR__ . '/public/index.php';
}

$log = __DIR__ . '/tmp/debug.log';

log_file(
    $log,
    ls_included(0),
    trace_logs(0)
);

echo file_get_contents($log);