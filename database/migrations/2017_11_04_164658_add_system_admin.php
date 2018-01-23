<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\DatabaseManager;

class AddSystemAdmin extends Migration
{
    private $dbManager;
    private $hasher;
    
    public function __construct()
    {
        $this->dbManager = app(DatabaseManager::class);
        $this->hasher = app('hash');
    }
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
$this->dbManager->unprepared("insert into users (username, password) values('" . env('SYSTEM_ADMIN_USERNAME') . "', '" . $this->hasher->make(env('SYSTEM_ADMIN_PASSWORD')) . "')");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->dbManager->unprepared("delete from users where username='" . env('SYSTEM_ADMIN_USERNAME') . "'");
    }
}
