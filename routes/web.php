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

    Route::get('/', 'LoginController@index')->name('login');
    Route::post('/login', 'LoginController@login');
Route::view('/home', 'pages/home')->middleware(['authenticate', 'token']);
    Route::post('/logout', 'LoginController@logout');
    
Route::resource('positions', 'PositionController')->except('show');
Route::resource('projects', 'ProjectController')->except('show');
Route::resource('employees', 'EmployeeController')->except('show');
