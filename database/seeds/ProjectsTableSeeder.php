<?php

use Illuminate\Database\Seeder;;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Database\Connection;
use Faker\Generator;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
* @param \Illuminate\Database\Connection $con
     * @return void
     */
    public function run(Connection $con, Generator $faker)
    {
        $timeFormat = 'H:i:s';
$con->transaction(function() use($timeFormat, $faker) {
for ($i = 0; $i < 10; $i++)
{
        $timeInHour = rand(0, 23);
        $timeInMinutes = rand(0, 59);
        $timeInSeconds = 0;
        $timeOutHour = rand($timeInHour+1, 24);
        $timeOutMinutes = rand(0, 59);
        $timeOutSeconds = 0;
        
        do {
            $name = str_random(rand(2, 5));
        } while (Project::where('name', $name)->exists());
        
        Project::create([
            'name'=>$name,
            'address'=>$faker->randomElement([null, str_random(rand(2, 5))]),
            'time_in'=>Carbon::createFromTime($timeInHour, $timeInMinutes, $timeInSeconds)->format($timeFormat),
            'time_out'=>Carbon::createFromTime($timeOutHour, $timeOutMinutes, $timeOutSeconds)->format($timeFormat),
        ]);
}
});
    }
}
