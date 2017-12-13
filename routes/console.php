<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Database\DatabaseManager;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('db:create', function(DatabaseManager $db) {
    $databaseName = env('DB_DATABASE');
    try {
$db->connection()->getPdo();
        $this->info("Database already created.");
    } catch(Exception $e) {        
        config(['database.connections.' . env('DB_CONNECTION') . '.database' => null]);
        $db->reconnect();
        $db->unprepared('create database if not exists `' . $databaseName . '`');
$this->info("Database created successfully.");
    }
    })-> describe("Creates database if not exists.");

Artisan::command('db:drop', function(DatabaseManager $db) {
    $databaseName = env('DB_DATABASE');
    try {
        $db->connection()->getPdo();
$db->unprepared('drop database if exists `' . $databaseName . '`');
$this->info("Database dropped successfully.");
    } catch(Exception $e) {
        $this->info("Database does not exist.");
    }
    })-> describe("Drops database if exists.");

