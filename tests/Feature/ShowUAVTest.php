<?php

namespace Tests\Feature;

use Tests\TestCase;

class ShowUAVTest extends TestCase
{
    /** @test */
    public function a_guest_may_not_view_uavs_information()
    {
        $this->withExceptionHandling();

        $response = $this->json("GET", "/uavs");

        $response->assertStatus(401);
    }

    /** @test */
    public function normal_users_may_not_view_uavs_information()
    {
        $this->withExceptionHandling();

        $this->signIn();

        $response = $this->json("GET", "/uavs");

        $response->assertStatus(401);
    }

    /** @test */
    public function admins_can_view_uavs_information()
    {
        $this->withExceptionHandling();

        $this->signInAdmin();

        $response = $this->json("GET", "/uavs");

        $response->assertStatus(200);
    }
}
