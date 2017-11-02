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
            $table->char('id_number', 8)->unique();
            $table->char('biometric_id', 4)->nullable()->unique();
            $table->char('account_number', 25)->unique();
            $table->string('last_name', 50);
            $table->string('first_name', 100);
            $table->string('middle_name', 50);
            $table->string('city_address', 255);
            $table->string('provincial_address', 255)->nullable();
$table->char('telephone_number', 9)->nullable();
$table->char('mobile_number1', 13)->nullable();
$table->char('mobile_number2', 13)->nullable();
            $table->date('birthdate');
            $table->enum('civil_status', ['Single', 'Married']);
            $table->unsignedTinyInteger('number_of_dependencies')->nullable();
            $table->string('citizenship', 30);
            $table->string('religion', 30)->nullable();
            $table->enum('gender', ['Male', 'Female']);
            $table->char('sss_id', 12)->nullable();
            $table->char('phic_id', 14)->nullable();
            $table->char('hdmf_id', 14)->nullable();
            $table->char('tin_id', 15)->nullable();
            $table->enum('payroll_type', ['Weekly', 'Monthly']);
            $table->date('date_started');
            $table->boolean('agency');
            $table->boolean('regular');
            $table->boolean('active');
            $table->unsignedInteger('position_id')->nullable();
            $table->unsignedInteger('project_id')->nullable();
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
