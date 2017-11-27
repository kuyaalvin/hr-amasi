<?php

use Illuminate\Database\Seeder;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Database\Connection;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Connection $con)
    {
        $timeFormat = 'H:i:s';
$con->transaction(function() use($timeFormat) {
for ($i = 0; $i < 1000; $i++)
{
        $timeInHour = rand(0, 23);
        $timeInMinutes = rand(0, 59);
        $timeInSeconds = rand(0, 59);
        $timeOutHour = rand($timeInHour+1, 24);
        $timeOutMinutes = rand(0, 59);
        $timeOutSeconds = rand(0, 59);
        
        do {
            $name = str_random(rand(2, 5));
        } while (Project::where('name', $name)->exists());
        
        Project::create([
            'name'=>$name,
            'address'=>str_random(rand(2, 5)),
            'time_in'=>Carbon::createFromTime($timeInHour, $timeInMinutes, $timeInSeconds)->format($timeFormat),
            'time_out'=>Carbon::createFromTime($timeOutHour, $timeOutMinutes, $timeOutSeconds)->format($timeFormat),
        ]);
}
});
    }
}
