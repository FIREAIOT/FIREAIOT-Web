<?php

namespace Tests\Feature;

use Tests\TestCase;

class ShowAlarmTest extends TestCase
{
    /** @test */
    public function a_normal_user_may_not_view_all_reported_alarms()
    {
        $this->withExceptionHandling();

        $this->signIn();

        $this->get("/api/alarms")
            ->assertStatus(401);
    }

    /** @test */
    public function an_admin_can_view_all_reported_alarms()
    {
        $alarm = factory(\App\Alarm::class)->create();

        $this->signInAdmin();

        $this->get("/api/alarms")
            ->assertStatus(200)
            ->assertSee($alarm->longitude);
    }
}
