<?php

Route::get('/', function () {
    return ['method'=>'NOT_ALLOWED', status=> 0, 'description'=>'method not allowed'];
});

Route::get('/players', function () {
    return ['method'=>'OK', status=> 1, 'description'=>'players'];
});

Route::get('/matches', function () {
    return ['method'=>'OK', status=> 1, 'description'=>'matches'];
});

Route::get('/users', function () {
    return ['method'=>'OK', status=> 1, 'description'=>'users'];
});