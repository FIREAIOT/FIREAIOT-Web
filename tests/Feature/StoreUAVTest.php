<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoreUAVTest extends TestCase
{
    /** @test */
    public function authorized_users_can_add_their_uav()
    {
        $this->signIn();

        $data = [
            "home_latitude"  => 25.43232,
            "home_longitude" => 25.43232,
        ];

        $response = $this->json("POST", "/api/v1/uavs", $data);

        $response->assertStatus(201);

        $this->assertDatabaseHas("uavs", $data);
    }
}
