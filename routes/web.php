<?php

use Illuminate\Support\Facades\Route;
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


Auth::routes();


/* End-user routes */
Route::get('/', 'ToDoController@index')->name('todo_list');
Route::post('/create', 'TodoController@create')->name('todo_create');
Route::post('/complete', 'TodoController@complete')->name('todo_complete');
Route::post('/delete', 'TodoController@delete')->name('todo_delete');


/*  Admin routes  */
Route::get('/admin/list', 'AdminController@list')->name('admin_user_list');
Route::get('/admin/view/{user_id}', 'AdminController@view')->name('admin_user_view');
