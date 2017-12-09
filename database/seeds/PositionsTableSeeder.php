<?php

use Illuminate\Database\Seeder;
use App\Models\Position;
use Illuminate\Database\Connection;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
* @param \Illuminate\Database\Connection $con
     * @return void
     */
    public function run(Connection $con)
    {
        $con->transaction(function() {
for ($i = 0; $i < 5000; $i++)
{
    do {
        $name = str_random(rand(2, 5));
    } while (Position::where('name', $name)->exists());
    
    Position::create([
        'name'=>$name,
    ]);
    
}
        });
    }
}
