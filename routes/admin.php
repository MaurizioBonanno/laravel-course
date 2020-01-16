<?php

Route::get('/','HomeController@index');

Route::get('/user/{name?}', 'WelcomeController@welcome');

Route::get('/dashboard', function () {
    echo " Hello admin dashboard";
});

