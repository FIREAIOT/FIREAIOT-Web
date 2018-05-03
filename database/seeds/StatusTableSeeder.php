<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Status::create([
            "name" => "pending"
        ]);

        \App\Status::create([
            "name" => "inProgress"
        ]);

        \App\Status::create([
            "name" => "completed"
        ]);
    }
}
