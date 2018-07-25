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

Route::view('/', 'pages/index')->middleware('guest')->name('login');
    Route::post('/login', 'AuthController@login');
Route::view('/home', 'pages/home')->middleware(['authenticate', 'token']);
    Route::post('/logout', 'AuthController@logout');
    
Route::resource('positions', 'PositionController')->except('show');
Route::resource('projects', 'ProjectController')->except('show');
Route::resource('employees', 'EmployeeController')->except('show');
Route::get('projects/transfer', 'ProjectController@viewTransfer');
Route::get('data', 'ProjectController@data');


Route::get('employees/{employee}/profile', 'EmployeeController@profile');
Route::get('projects/{project}/profile', 'ProjectController@profile');
Route::get('projects/{project_id}/employees/agency', 'ProjectController@getAgencyEmployees');
Route::get('projects/{project_id}/employees/regular', 'ProjectController@getRegularEmployees');
