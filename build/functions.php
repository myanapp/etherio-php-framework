<?php

function read_json(string $path_to_file)
{
    /* read JSON files by using "file_get_contents" and... */
    $contents = file_get_contents($path_to_file);

    /* return PHP_ARRAY (if existed) or FALSE (if doesn't existed) */
    return $contents ? json_decode($contents) : false;
}
