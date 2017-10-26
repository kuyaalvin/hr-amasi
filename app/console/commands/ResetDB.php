<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ResetDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ResetDB';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drops and recreates the current database then migrate tables';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $db = env('DB_DATABASE');
$this->info("dropping: $db");
        DB::unprepared("Drop database $db");
        $this->info("Dropped: $db");
        $this->info("Creating: $db");
        DB::unprepared("create database $db");
        $this->info("Created: $db");
        DB::unprepared("use $db");
        $this->info("Using $db");
        $this->call('migrate');
    }
}
