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

Route::get('/', [
	'uses' => 'HomeController@index',
	'as' => 'home',
	]);

Route::get('/register', [
	'uses' => 'AuthController@getRegister',
	'as' => 'register'
	]);

Route::get('/login', [
	'uses' => 'AuthController@getLogin',
	'as' => 'login'
	]);

Route::post('/user/register', [
	'uses' => 'AuthController@createUser',
	'as' => 'user.register',
	]);

Route::post('/user/login', [
	'uses' => 'AuthController@userLogin',
	'as' => 'user.login',
	]);

Route::get('/logout', [
	'uses' => 'AuthController@userLogout',
	'as' => 'user.logout',
	]);

Route::group(['prefix'=>'user','middleware'=>'auth'], function() {
	Route::get('/home', [
		'uses' => 'TodosController@index',
		'as' => 'todo.home',
		]);

	Route::get('/todo/create', [
		'uses' => 'TodosController@create',
		'as' => 'todo.create',
		]);

	Route::post('/todo/store', [
		'uses' => 'TodosController@store',
		'as' => 'todo.store',
		]);

	Route::get('/todo/all', [
		'uses' => 'TodosController@viewTodo',
		'as' => 'todos',
		]);

	Route::get('/todo/edit/{id}', [
		'uses' => 'TodosController@edit',
		'as' => 'todo.edit',
		]);

	Route::post('/todo/update/{id}', [
		'uses' => 'TodosController@update',
		'as' => 'todo.update',
		]);

//getting all completed todo
	Route::get('/todo/completed/all', [
		'uses' => 'TodosController@showCompleted',
		'as' => 'completed',
		]);

	Route::get('/todo/completed/{id}', [
		'uses' => 'TodosController@getCompleted',
		'as' => 'todo.completed',
		]);

	//make uncompleted
	Route::get('/todo/uncompleted/{id}', [
		'uses' => 'TodosController@makeUncompleted',
		'as' => 'make.uncompleted',
		]);

		//trashing the todos
	Route::get('/todo/trash/{id}', [
		'uses' => 'TodosController@delete',
		'as' => 'todo.delete',
		]);

	//showing thrashed todos
	Route::get('/todo/thrashed/all', [
		'uses' => 'TodosController@destroy',
		'as' => 'todo.trash',
		]);

	//restoring the todos
	Route::get('/todo/restore/{id}', [
		'uses' => 'TodosController@restore',
		'as' => 'todo.restore',
		]);

	//permanently deleting todos
	Route::get('/todo/delete-permanently/{id}', [
		'uses' => 'TodosController@permanentlyDelete',
		'as' => 'trashed.delete'
		]);

});
