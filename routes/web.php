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

Route::group(['prefix'=>'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'web'], function () {
	Route::get('/', ['uses'=>'AdminController@index', 'as'=>'dashboard']);
	Route::get('/login', ['uses'=>'Auth\LoginController@index', 'as'=>'index']);
	Route::post('/login', ['uses'=>'Auth\LoginController@login', 'as'=>'login']);
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'roles', 'as'=>'roles.'], function () {
	Route::get('/', ['uses'=>'RoleController@index', 'as'=>'show']);
	Route::post('/insert', ['uses'=>'RoleController@store', 'as'=>'insert']);
});
