<?php

namespace Tests\Feature;

use Tests\TestCase;

class SpaTest extends TestCase
{
    /** @test */
    public function a_guest_can_hit_home_page_and_load_the_website_for_spa()
    {
        $this->get('/')
            ->assertStatus(200);
    }
}
