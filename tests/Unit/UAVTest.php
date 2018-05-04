<?php

namespace Tests\Unit;

use App\UAV;
use Tests\TestCase;

class UAVTest extends TestCase
{
    /** @test */
    public function uav_should_have_unique_id()
    {
        $this->uav = factory(UAV::class)->create();

        $this->assertNotEmpty($this->uav->uuid);
    }

    /** @test */
    public function uav_should_have_battery_life_indicator()
    {
        $this->uav = factory(UAV::class)->create(["battery" => 100]);

        $this->assertEquals($this->uav->battery, 100);
    }

    /** @test */
    public function uav_should_have_current_latitude_field()
    {
        $this->uav = factory(UAV::class)->create(["latitude" => 1.11232]);

        $this->assertEquals($this->uav->latitude, 1.11232);
    }

    /** @test */
    public function uav_should_have_current_longitude_field()
    {
        $this->uav = factory(UAV::class)->create(["longitude" => 1.11232]);

        $this->assertEquals($this->uav->longitude, 1.11232);
    }

    /** @test */
    public function uav_should_have_isReady_field()
    {
        $this->uav = factory(UAV::class)->create(["isReady" => true]);

        $this->assertEquals($this->uav->isReady, true);
    }

    /** @test */
    public function uav_should_have_current_attitude_field()
    {
        $this->uav = factory(UAV::class)->create(["attitude" => 10]);

        $this->assertEquals($this->uav->attitude, 10);
    }

    /** @test */
    public function uav_should_have_home_latitude_field()
    {
        $this->uav = factory(UAV::class)->create(["home_latitude" => 1.0]);

        $this->assertEquals($this->uav->home_latitude, 1.0);
    }

    /** @test */
    public function uav_should_have_home_longitude_field()
    {
        $this->uav = factory(UAV::class)->create(["home_longitude" => 1.0]);

        $this->assertEquals($this->uav->home_longitude, 1.0);
    }
}
