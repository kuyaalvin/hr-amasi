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
        $this->schema->table('positions', function (Blueprint $table) {
            $table->foreign('department_id')->references('department_id')->on('departments');
        });

        $this->schema->table('employees', function (Blueprint $table) {
            $table->foreign('position_id')->references('position_id')->on('positions')->nullable()->onDelete('set null');
        });

        $this->schema->table('employees_projects', function (Blueprint $table) {
            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('cascade');
            $table->foreign('project_id')->references('project_id')->on('projects')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema->table('positions', function (Blueprint $table) {
            $table->dropForeign(['department_id']);
        });

        $this->schema->table('employees', function (Blueprint $table) {
            $table->dropForeign(['position_id']);
        });

        $this->schema->table('employees_projects', function (Blueprint $table) {
            $table->dropForeign(['employee_id']);
            $table->dropForeign(['project_id']);
        });

    }
}
