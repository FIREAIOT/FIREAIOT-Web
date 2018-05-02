<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;

class FireAlarmTest extends TestCase
{
    /** @test */
    public function a_guest_may_not_report_a_fire_alarm()
    {
        $this->withExceptionHandling();

        $response = $this->json("POST", "/api/alarms");

        $response->assertStatus(401);
    }

    /** @test */
    public function authorized_users_can_report_fire_alarms()
    {
        $this->signIn();

        $response = $this->json("POST", "/api/alarms", [
            "longitude" => 101.43232,
            "latitude"  => 25.43232,
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas("alarms", [
            "longitude" => 101.43232,
            "latitude"  => 25.43232,
        ]);
    }
}
