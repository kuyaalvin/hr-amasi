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
Route::get('positions/data', 'PositionController@getData');
Route::get('positions/hierarchy', 'PositionController@getHierarchy');
Route::get('positions/by_departments/{department_id}/data', 'PositionController@getPositionsByDepartments');
Route::get('positions/hierarchy/{department_id}/edit', 'PositionController@editHierarchy');
Route::post('positions/hierarchy/update', 'PositionController@updateHierarchy');

Route::resource('departments', 'DepartmentController')->except('show');
Route::get('departments/data', 'DepartmentController@getData');
Route::resource('projects', 'ProjectController')->except('show');
Route::get('projects/data', 'ProjectController@getData');
Route::get('projects/{project_id}/employees/staff/data', 'ProjectController@getStaffEmployees');
Route::get('projects/{project_id}/employees/worker/admin/data', 'ProjectController@getWorkerAdminEmployees');
Route::get('projects/{project_id}/employees/worker/agency/data', 'ProjectController@getWorkerAgencyEmployees');
Route::resource('employees', 'EmployeeController')->except('show');
Route::get('employees/data', 'EmployeeController@getData');
Route::get('projects/transfer', 'ProjectController@viewTransfer');
Route::get('employees/{employee}/profile', 'EmployeeController@profile');
Route::get('projects/{project_id}/profile', 'ProjectController@profile');
Route::get('projects/{project_id}/employees/agency', 'ProjectController@getAgencyEmployees');
Route::get('projects/{project_id}/employees/regular', 'ProjectController@getRegularEmployees');
