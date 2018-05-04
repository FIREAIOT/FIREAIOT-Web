<?php

use Illuminate\Database\Seeder;

class UAVTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\UAV::class, 10)->create();
    }
}
