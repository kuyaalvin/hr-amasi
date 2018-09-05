<?php

use Illuminate\Database\Seeder;;
use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Database\Connection;
use Faker\Generator;

class DepartmentsTableSeeder extends Seeder
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
for ($i = 0; $i < 10; $i++)
{        
        do {
            $name = str_random(rand(2, 5));
        } while (Department::where('name', $name)->exists());
        
        Department::create([
            'name'=>$name,
        ]);
}
});
    }
}
