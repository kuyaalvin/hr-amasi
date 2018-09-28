<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Builder;

class CreateProjectsTable extends Migration
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
        $this->schema->create('projects', function (Blueprint $table) {
            $table->increments('project_id');
            $table->string('name', 200)->unique();
            $table->string('address', 255)->nullable();
            $table->time('time_in')->nullable();
            $table->time('time_out')->nullable();
            $table->boolean('active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema->dropIfExists('projects');
    }
}
