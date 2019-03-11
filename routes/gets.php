<?php

Route::get('/', function () {
    return 'hello';
});

Route::get('/account', function () {
    return 'account';
});

Route::get('/hello', 'login');   

Route::post('/account', 'login');