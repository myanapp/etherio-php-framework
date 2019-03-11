<?php

function required(string ...$path_to_file) {
    $file_path = join(DIRECTORY_SEPARATOR, $path_to_file);
    if (!is_file($file_path)) return $file_path;
    require_once $file_path;
    return false;
}