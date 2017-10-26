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
    protected $signature = 'db:fresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drop everything and re-run all migrations';

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
        DB::unprepared('drop event if exists set_active_employees');
$this->info('Dropped set_active_employees event successfully.');
        $this->call('migrate:fresh');
    }
}
