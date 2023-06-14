<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $time_start = microtime(true);
        //Start Seeding
        $this->call(AccessSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategoriesSeeder::class);
        //End Seeding
        $time_end = microtime(true);
        $execution_time = ($time_end - $time_start);
        echo "\n\n" . 'Total Execution Time: ' . $execution_time . ' seconds ';
    }
}
