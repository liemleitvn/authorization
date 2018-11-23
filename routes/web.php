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


Route::get('/test','RoleController@test');

Route::group(['prefix'=>'admin', 'as'=>'admin.', 'namespace'=>'Admin', 'middleware'=>'superAdmin'], function () {
	Route::get('/',['uses'=>'AdminController@index']);
	Route::group(['prefix'=>'user', 'as'=>'user.'], function (){
		Route::get('/', ['uses'=>'UserManagerController@index', 'as'=>'show']);
		Route::get('/edit/{id}', ['uses'=>'UserManagerController@edit', 'as'=>'edit']);
		Route::post('/edit/{id}', ['uses'=>'UserManagerController@update', 'as'=>'update']);
		Route::get('/delete/{id}', ['uses'=>'UserManagerController@delete', 'as'=>'delete']);
	});
	Route::group(['prefix'=>'roles', 'as'=>'roles.'], function () {
		Route::get('/', ['uses'=>'RoleManagerController@index', 'as'=>'show']);
		Route::post('/insert', ['uses'=>'RoleManagerController@store', 'as'=>'insert']);
		Route::get('delete/{id}', ['uses'=>'RoleManagerController@delete', 'as'=>'delete']);
		Route::get('edit/{id}', ['uses'=>'RoleManagerController@edit', 'as'=>'edit']);
		Route::post('/set-role-user/{id}', ['uses'=>'RoleManagerController@setPermission', 'as'=>'update']);
	});

//	Route::group(['prefix'=>'manager-role', 'as'=>'manager-role.'], function (){
//		Route::get('/', ['uses'=>'ManagerRoleController@index', 'as'=>'show']);
//		Route::post('/', ['uses'=>'ManagerRoleController@updateRole', 'as'=>'update-role']);
//	});
});
