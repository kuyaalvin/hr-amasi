<?php

use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
for ($i = 0; $i < 100; $i++)
{
    do {
        $name = str_random(rand(2, 5));
    } while (Position::where('name', $name)->exists());
    
    Position::create([
        'name'=>$name,
    ]);
    
}
    }
}
