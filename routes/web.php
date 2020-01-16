<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\AlbumsController;
use App\Models\Album;
use App\Models\Photo;
use App\User;

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/albums', 'AlbumsController@index');
Route::delete('/albums/{id}','AlbumsController@delete');
Route::get('/albums/{id}', 'AlbumsController@show');
Route::get('/albums/{id}/edit', 'AlbumsController@edit');

Route::get('/photos', function () {
    return Photo::all();
});

Route::get('/users', function () {
    return User::all();
});

Route::patch('/updated/{id}','AlbumsController@store');
