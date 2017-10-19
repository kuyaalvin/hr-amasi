<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('employee_id');
            $table->char('id_number', 10)->unique();
            $table->char('biometric_id', 255)->nullable()->unique();
            $table->char('account_number', 25)->unique();
            $table->string('last_name', 50);
            $table->string('first_name', 100);
            $table->string('middle_name', 50);
            $table->string('city_address', 255);
            $table->string('provincial_address', 255)->nullable();
            $table->date('birthdate');
            $table->enum('civil_status', ['Single', 'Married']);
            $table->unsignedTinyInteger('number_of_dependencies');
            $table->string('citizenship', 30);
            $table->string('religion', 30)->nullable();
            $table->enum('gender', ['Male', 'Female']);
            $table->char('sss_id', 20)->nullable();
            $table->char('tin_no', 20)->nullable();
            $table->char('phil_health_mp', 20)->nullable();
            $table->enum('payroll_type', ['Weekly', 'Monthly']);
            $table->date('date_started');
            $table->boolean('agency');
            $table->boolean('regular');
            $table->boolean('active');
            $table->unsignedInteger('position_id');
            $table->unsignedInteger('project_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
