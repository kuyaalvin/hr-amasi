<?php

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Project;
use App\Models\EmployeeProject;
use Faker\Generator;
use Illuminate\Database\Connection;

class EmployeesProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
* @param \Illuminate\Database\Connection $con
     * @return void
     */
    public function run(Connection $con, Generator $faker)
    {

        $con->transaction(function() use($faker) {
$employeeIds = Employee::pluck('employee_id')->toArray();
$projectIds = Project::pluck('project_id')->toArray();

foreach ($employeeIds as $employeeId)
{

    EmployeeProject::create([
'employee_id'=>$employeeId,
'project_id'=>$faker->randomElement($projectIds),

    ]);
    
}
        });
    }
}
