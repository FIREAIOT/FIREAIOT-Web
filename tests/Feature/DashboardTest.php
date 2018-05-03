<?php

namespace Tests\Feature;

use Tests\TestCase;

class DashboardTest extends TestCase
{
    /** @test */
    public function a_guest_may_not_visit_dashboard_page()
    {
        $this->get("/dashboard")
            ->assertStatus(302)
            ->assertRedirect("/login");
    }

    /** @test */
    public function a_normal_user_may_not_visit_dashboard()
    {
        $this->withExceptionHandling();

        $this->signIn();

        $this->get("/dashboard")->assertStatus(401);
    }
}
