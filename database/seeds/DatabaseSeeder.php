<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(StatusTableSeeder::class);
         $this->call(AlarmTableSeeder::class);
         $this->call(UserTableSeeder::class);
         $this->call(UAVTableSeeder::class);
    }
}
