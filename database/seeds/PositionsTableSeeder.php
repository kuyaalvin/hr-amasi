<?php

use Illuminate\Database\Seeder;
use App\Models\Position;
use App\Models\Department;
use Faker\Generator;
use Illuminate\Database\Connection;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
* @param \Illuminate\Database\Connection $con
     * @return void
     */
    public function run(Connection $con, Generator $faker)
    {
$types = ['Staff', 'Worker'];

        $con->transaction(function() use($departmentIds, $types, $faker) {
$departmentIds = Department::pluck('department_id')->toArray();

for ($i = 0; $i < 10; $i++)
{
    do {
        $name = str_random(rand(2, 5));
    } while (Position::where('name', $name)->exists());

    Position::create([
        'name'=>$name,
'type'=>$faker->randomElement($types),
    'level'=>$faker->optional()->numberBetween(1, 10),
'department_id'=>$faker->randomElement($departmentIds),
    ]);
    
}
        });
    }
}
