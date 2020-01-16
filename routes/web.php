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

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\AlbumsController;
use App\Models\Album;
use App\Models\Photo;
use App\User;

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/albums', 'AlbumsController@index')->name('albums');
Route::get('/albums/create', 'AlbumsController@create')->name('album.create');
Route::delete('/albums/{id}','AlbumsController@delete');
Route::get('/albums/{id}', 'AlbumsController@show')->where('id','[0-9]+');
Route::get('/albums/{id}/edit', 'AlbumsController@edit');

Route::get('/users_no_album',function(){
    $usersNoAlbum = DB::table('users as u')
    ->leftJoin('albums as a','u.id','a.user_id')
    ->select('u.id','email','name','album_name')
    ->whereNull('album_name')
    ->get();
    return $usersNoAlbum;
});

Route::get('/photos', function () {
    return Photo::all();
});

Route::get('/users', function () {
    return User::all();
});

Route::patch('/updated/{id}','AlbumsController@store');
Route::post('/albums', 'AlbumsController@save')->name('album.save');
