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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Route::get('/', 'API\ChatsController@index');
Route::get('messages', 'API\ChatsController@fetchMessages');
Route::post('messages', 'API\ChatsController@sendMessage');


Route::post('talk', 'API\TalkController@store');
Route::get('talk/{slug}', 'API\TalkController@view');
Route::get('/talk/chat{slug}', 'API\TalkController@chat');
