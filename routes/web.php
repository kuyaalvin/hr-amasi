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

Route::view('/', 'pages/index');

    Route::get('/login', 'LoginController@index')->name('login');

Route::resource('positions', 'PositionController')->except('show');
Route::resource('projects', 'ProjectController')->except('show');
