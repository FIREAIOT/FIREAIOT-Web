<?php

use Illuminate\Database\Seeder;

class AlarmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Alarm::class, 10)->create();
    }
}
