<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Builder;

class AddForeignKeys extends Migration
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
        $this->schema->table('employees', function (Blueprint $table) {
            $table->foreign('position_id')->references('position_id')->on('positions')->nullable()->onDelete('set null');
            $table->foreign('project_id')->references('project_id')->on('projects')->nullable()->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema->table('employees', function (Blueprint $table) {
            $table->dropForeign(['position_id']);
            $table->dropForeign(['project_id']);
        });
    }
}
