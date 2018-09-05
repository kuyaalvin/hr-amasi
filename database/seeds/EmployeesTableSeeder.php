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
        $employmentTypes = ['Admin', 'Agency'];
        $positionIds = Position::pluck('position_id')->toArray();
$projectIds = Project::pluck('project_id')->toArray();

$randomLength = function() {
   return rand(2, 5);
};

$fakerStrRandom = function($length, $optional = false) use($faker) {
    $str = str_repeat('?', $length);
    return $optional ? $faker->optional()->lexify($str) : $faker->lexify($str);
};

$con->transaction(function() use($dateFormat, $civilStatuses, $genders, $payrollTypes, $employmentTypes, $positionIds, $projectIds, $randomLength, $fakerStrRandom, $faker) {
for ($i = 0; $i < 1000; $i++)
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

Employee::create([
    'last_name'=>$fakerStrRandom($randomLength()),
    'middle_name'=>$fakerStrRandom($randomLength()),
    'first_name'=>$fakerStrRandom($randomLength()),
    'first_name'=>$fakerStrRandom($randomLength()),
    'mothers_maiden_name'=>$fakerStrRandom($randomLength(), true),
    'city_address'=>$fakerStrRandom($randomLength()),
    'provincial_address'=>$fakerStrRandom($randomLength(), true),
    'telephone_number'=>$faker->optional()->regexify('^\d{3}-\d{2}-\d{2}$'),
    'mobile_number1'=>$faker->optional()->regexify('^\d{4}-\d{3}-\d{4}$'),
    'mobile_number2'=>$faker->optional()->regexify('^\d{4}-\d{3}-\d{4}$'),
    'birthdate'=>$faker->date($dateFormat, Carbon::yesterday()->format($dateFormat)),
    'birth_place'=>$fakerStrRandom($randomLength()),
    'emergency_contact_name'=>$fakerStrRandom($randomLength(), true),
    'emergency_contact_number'=>$fakerStrRandom($randomLength(), true),
    'emergency_contact_address'=>$fakerStrRandom($randomLength(), true),
    'civil_status'=>$faker->randomElement($civilStatuses),
    'number_of_dependencies'=>$faker->optional()->numberBetween(0, 20),
    'citizenship'=>$fakerStrRandom($randomLength()),
    'religion'=>$fakerStrRandom($randomLength(), true),
    'gender'=>$faker->randomElement($genders),
    'sss_id'=>$faker->optional()->regexify('^\d{2}-\d{7}-\d$'),
    'phic_id'=>$faker->optional()->regexify('^\d{2}-\d{9}-\d$'),
    'hdmf_id'=>$faker->optional()->regexify('^\d{4}-\d{4}-\d{4}$'),
    'tin_id'=>$faker->optional()->regexify('^\d{3}-\d{3}-\d{3}-000$'),
    'account_number'=>$accountNumber,
    'biometric_id'=>$biometricId,
    'payroll_type'=>$faker->randomElement($payrollTypes),
    'date_started'=>$faker->date($dateFormat),
    'date_hired'=>$faker->optional()->date($dateFormat),
    'date_terminated'=>$faker->optional()->date($dateFormat),
    'employment_type'=>$faker->randomElement($employmentTypes),
    'referred_by'=>$fakerStrRandom($randomLength(), true),
    'walk_in'=>$fakerStrRandom($randomLength(), true),
'status'=>'active',
    'position_id'=>$faker->optional()->randomElement($positionIds),
    'project_id'=>$faker->optional()->randomElement($projectIds),
    ]);
}
});
    }
}
