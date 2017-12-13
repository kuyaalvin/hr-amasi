<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Builder;

class CreateLoginsTable extends Migration
{
    private $schema;

    public function __construct()
    {
    $this->schema = app(Builder::class);
    }
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('logins', function (Blueprint $table) {
            $table->increments('login_id');
            $table->string('username', 16);
            $table->string('password', 255);
            $table->string('token', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema->dropIfExists('logins');
    }
}
