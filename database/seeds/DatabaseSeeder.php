<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DepartmentsTableSeeder::class,
            PositionsTableSeeder::class,
            ProjectsTableSeeder::class,
            EmployeesTableSeeder::class,
            EmployeesProjectsTableSeeder::class,

        ]);
    }
}
