<?php

$_SERVER[PATH_INFO] === '/' ? index() : path();

function index()
{
    echo 'idnex';
}

function path()
{
    echo 'path';
}