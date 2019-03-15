<?php

function trace_logs($show = 1)
{
    header('Content-Type: text/plain');
    $contents = debug_backtrace();
    $counts = count($contents);
    $json = json_encode($contents, JSON_PRETTY_PRINT);
    $text = preg_replace('!\\\!', '', $json);
    if ($show) echo "Trace Files ($counts):\n", $text, "\r\n\r\n";

    return ['contents' => ['total' => $counts, 'log' => $contents]];
}

function ls_included($show = 1)
{
    header('Content-Type: text/plain');
    $contents = get_included_files();
    $counts = count($contents);
    $json = json_encode($contents, JSON_PRETTY_PRINT);
    $text = preg_replace('!\\\!', '', $json);
    if ($show)  echo "Included Files ($counts):\n", $text, "\r\n\r\n";
    return ['included' => ['total' => $counts, 'log' => $contents]];
}

function log_file($dist, ...$arr)
{
    if (!file_exists($dist)) file_put_contents($dist, '[]');

    $cdata = [
        'remote_name' => $_ENV['LOGNAME'],
        'remote_user' => $_ENV['USER'],
        'remote_home' => $_ENV['HOME'],
        'remote_port' => $_SERVER['REMOTE_PORT'],
        'remote_ip' => $_SERVER['REMOTE_ADDR'],
        'client_ip' => $_SERVER['X_FORWARDED_FOR'],
        'document_root' => $_SERVER['DOCUMENT_ROOT'],
        'timestamp' => $_SERVER['REQUEST_TIME'],
        'method' => $_SERVER['REQUEST_METHOD'],
        'host' => $_SERVER['SERVER_NAME'],
        'port' => $_SERVER['SERVER_PORT'],
        'logs' => array_merge($arr)
    ];
    $data = file_get_contents($dist);
    $data = json_decode($data, true);
    array_push($data, $cdata);

    $contents = json_encode($data, JSON_PRETTY_PRINT);
    $contents = preg_replace('!\\\!', '', $contents);
    file_put_contents($dist, $contents);
}