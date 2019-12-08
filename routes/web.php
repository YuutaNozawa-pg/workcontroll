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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/userwork/index', 'UserWorkController@index');
Route::get('/userwork/list', 'UserWorkController@list');
Route::post('/userwork/create', 'UserWorkController@create');
Route::post('/userwork/update', 'UserWorkController@update');