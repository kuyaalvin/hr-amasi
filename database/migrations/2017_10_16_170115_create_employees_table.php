<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Builder;

class CreateEmployeesTable extends Migration
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
        $this->schema->create('employees', function (Blueprint $table) {
            $table->increments('employee_id');
            $table->char('id_number', 8)->unique();
            $table->string('last_name', 50);
            $table->string('first_name', 100);
            $table->string('middle_name', 50);
$table->string('mothers_maiden_name', 50)->nullable();
$table->string('city_address', 255);
            $table->string('provincial_address', 255)->nullable();
$table->char('telephone_number', 9)->nullable();
$table->char('mobile_number1', 13)->nullable();
$table->char('mobile_number2', 13)->nullable();
            $table->date('birthdate');
$table->string('birth_place', 50);
$table->string('emergency_contact_name', 50)->nullable();
$table->char('emergency_contact_number', 13)->nullable();
$table->string('emergency_contact_address', 255)->nullable();
            $table->enum('civil_status', ['Single', 'Married']);
            $table->unsignedTinyInteger('number_of_dependencies')->nullable();
            $table->string('citizenship', 30);
            $table->string('religion', 30)->nullable();
            $table->enum('gender', ['Male', 'Female']);
            $table->char('sss_id', 12)->nullable();
            $table->char('phic_id', 14)->nullable();
            $table->char('hdmf_id', 14)->nullable();
            $table->char('tin_id', 15)->nullable();
            $table->char('account_number', 25)->unique()->nullable();
            $table->char('biometric_id', 4)->nullable()->unique();
            $table->enum('payroll_type', ['Weekly', 'Monthly']);
            $table->date('date_started');
$table->date('date_hired')->nullable();
            $table->date('date_terminated')->nullable();
            $table->enum('employment_type', ['Agency', 'Admin']);
$table->string('referred_by', 50)->nullable();
$table->string('walk_in', 50)->nullable();
$table->enum('status', ['Active', 'Terminated', 'AWOL', 'Deceased', 'Others'])->default('active');
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
        $this->schema->dropIfExists('employees');
    }
}
