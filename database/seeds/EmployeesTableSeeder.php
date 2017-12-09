<?php

use Illuminate\Database\Seeder;
use App\Models\Position;
use App\Models\Employee;
use Faker\Generator;
use Carbon\Carbon;
use App\Models\Project;
use Illuminate\Database\Connection;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
* @param \Faker\Generator $generator
* @param \Illuminate\Database\Connection $con
     * @return void
     */
    public function run(Connection $con, Generator $faker)
    {
        $dateFormat = 'Y-m-d';
        $civilStatuses = ['Single', 'Married'];
        $genders = ['Male', 'Female'];
        $payrollTypes = ['Weekly', 'Monthly'];
        $positionIds = Position::pluck('position_id')->toArray();
$projectIds = Project::pluck('project_id')->toArray();

$randomLength = function() {
   return rand(2, 5);
};

$fakerStrRandom = function($length, $optional = false) use($faker) {
    $str = str_repeat('?', $length);
    return $optional ? $faker->optional()->lexify($str) : $faker->lexify($str);
};

$con->transaction(function() use($dateFormat, $civilStatuses, $genders, $payrollTypes, $positionIds, $projectIds, $randomLength, $fakerStrRandom, $faker) {
for ($i = 0; $i < 5000; $i++)
{
do {
    $accountNumber = $faker->optional()->regexify('^\d{' . $randomLength() . '}$');
if ($accountNumber === null)
{
break;
}
} while (Employee::where('account_number', $accountNumber)->exists());

do {
    $biometricId = $faker->optional()->regexify('^\d{1,4}$');
if ($biometricId === null)
{
break;
}
} while (Employee::where('biometric_id', $biometricId)->exists());

$agency = $faker->boolean;

Employee::create([
    'last_name'=>$fakerStrRandom($randomLength()),
    'middle_name'=>$fakerStrRandom($randomLength()),
    'first_name'=>$fakerStrRandom($randomLength()),
    'city_address'=>$fakerStrRandom($randomLength()),
    'telephone_number'=>$faker->optional()->regexify('^\d{3}-\d{2}-\d{2}$'),
    'mobile_number1'=>$faker->optional()->regexify('^\d{4}-\d{3}-\d{4}$'),
    'mobile_number2'=>$faker->optional()->regexify('^\d{4}-\d{3}-\d{4}$'),
    'provincial_address'=>$fakerStrRandom($randomLength(), true),
    'birthdate'=>$faker->date($dateFormat, Carbon::yesterday()->format($dateFormat)),
    'civil_status'=>$faker->randomElement($civilStatuses),
    'number_of_dependencies'=>$faker->optional()->numberBetween(0, 20),
    'citizenship'=>$fakerStrRandom($randomLength()),
    'religion'=>$fakerStrRandom($randomLength(), true),
    'gender'=>$faker->randomElement($genders),
    'sss_id'=>$faker->optional()->regexify('^\d{2}-\d{7}-\d$'),
    'phic_id'=>$faker->optional()->regexify('^\d{2}-\d{9}-\d$'),
    'hdmf_id'=>$faker->optional()->regexify('^\d{4}-\d{4}-\d{4}$'),
    'tin_id'=>$faker->optional()->regexify('^\d{3}-\d{3}-\d{3}-000$'),
    'payroll_type'=>$faker->randomElement($payrollTypes),
    'date_started'=>$faker->date($dateFormat),
    'account_number'=>$accountNumber,
    'biometric_id'=>$biometricId,
    'agency'=>$agency,
    'regular'=>$agency ? false : true,
    'position_id'=>$faker->optional()->randomElement($positionIds),
    'project_id'=>$faker->optional()->randomElement($projectIds),
    ]);
}
});
    }
}
