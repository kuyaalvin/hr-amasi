<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\DB;

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

Artisan::command('db:create', function() {
config(['database.connections.' . env('DB_CONNECTION') . '.database' => null]);
DB::unprepared('create database if not exists `' . env('DB_DATABASE') . '`');
$this->info("Create database if not exists executed.");
    })-> describe("Creates database if not exists.");

Artisan::command('db:drop', function() {
config(['database.connections.' . env('DB_CONNECTION') . '.database' => null]);
DB::unprepared('drop database if exists `' . env('DB_DATABASE') . '`');
$this->info("Drop database if exists executed.");
})-> describe("Drops database if exists.");

