<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Events\AlarmReceived;
use Illuminate\Support\Facades\Event;

class StoreAlarmTest extends TestCase
{
    /** @test */
    public function a_guest_may_not_report_a_fire_alarm()
    {
        $this->withExceptionHandling();

        $response = $this->json("POST", "/api/v1/alarms");

        $response->assertStatus(401);
    }

    /** @test */
    public function authorized_users_can_report_fire_alarms()
    {
        Event::fake();

        $this->signIn();

        $response = $this->json("POST", "/api/v1/alarms", [
            "longitude" => 101.43232,
            "latitude"  => 25.43232,
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas("alarms", [
            "longitude" => 101.43232,
            "latitude"  => 25.43232,
        ]);
    }

    /** @test */
    public function alarm_received_event_will_be_fired_when_a_new_alarm_report_placed()
    {
        Event::fake();

        $this->signIn();

        $this->json("POST", "/api/v1/alarms", [
            "longitude" => 101.43232,
            "latitude"  => 25.43232,
        ]);

        Event::assertDispatched(AlarmReceived::class);
    }
}
