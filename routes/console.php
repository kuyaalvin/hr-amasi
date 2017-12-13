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

    $dbName = env('DB_DATABASE');

Artisan::command('db:create', function(DatabaseManager $dbManager) use($dbName) {
    try {
$dbManager->connection()->getPdo();
        $this->info("Database already created.");
    } catch(Exception $e) {        
        config(['database.connections.' . env('DB_CONNECTION') . '.database' => null]);
        $dbManager->reconnect();
        $dbManager->unprepared('create database if not exists `' . $dbName . '`');
$this->info("Database created successfully.");
    }
    })-> describe("Creates database if not exists.");

Artisan::command('db:drop', function(DatabaseManager $dbManager) use($dbName) {
    try {
        $dbManager->connection()->getPdo();
$dbManager->unprepared('drop database if exists `' . $dbName . '`');
$this->info("Database dropped successfully.");
    } catch(Exception $e) {
        $this->info("Database does not exist.");
    }
    })-> describe("Drops database if exists.");

