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

    Route::prefix('positions')->group(function() {
        Route::get('/', 'PositionController@index');
        Route::get('create', 'PositionController@create');
        Route::post('/', 'PositionController@store');
        Route::get('/{position}/edit', 'PositionController@edit');
        Route::patch('/{position}', 'PositionController@update');
        Route::delete('/{position}', 'PositionController@destroy');

    });
    