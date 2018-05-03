<?php

namespace Tests\Feature;

use Tests\TestCase;

class DashboardTest extends TestCase
{
    /** @test */
    public function a_guest_may_not_visit_dashboard_page()
    {
        $this->withExceptionHandling();

        $this->get("/dashboard")
            ->assertStatus(302)
            ->assertRedirect("/login");
    }

    /** @test */
    public function a_normal_user_may_not_visit_dashboard()
    {
        $this->withExceptionHandling();

        $this->signIn();

        $this->get("/dashboard")
            ->assertStatus(401);
    }

    /** @test */
    public function admins_can_visit_dashboard()
    {
        $this->signInAdmin();

        $this->get("/dashboard")
            ->assertStatus(200);
    }

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
