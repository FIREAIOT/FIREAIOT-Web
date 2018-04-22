<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /** @test */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200)->assertSee('ILoveMath');
    }
}
