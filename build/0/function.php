<?php

function read_json($path_to_file)
{
    $contents = is_file($path_to_file) ? file_get_contents($path_to_file) : $path_to_file;
    return json_decode($contents, true);
}

function write_json($path_to_file,  $php_arr_content)
{
    $contents = json_encode($php_arr_content);
    return file_put_contents($path_to_file, $contents);
}