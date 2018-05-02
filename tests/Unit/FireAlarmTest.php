<?php

namespace Tests\Feature;

use Tests\TestCase;

class FireAlarmTest extends TestCase
{
    /** @test */
    public function an_alarm_should_contain_fire_location_coordinates()
    {
        $this->withExceptionHandling();

        $this->signIn();

        $response = $this->json("POST", "/api/alarms");

        $response->assertStatus(422);
    }
}
