<?php


Route::get('/', function(){
    return 'hello pages';
});

Route::get('/about','PageController@about');

Route::get('/staff','PageController@staff');
