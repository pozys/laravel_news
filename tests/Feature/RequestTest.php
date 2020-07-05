<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RequestTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRoot()
    {
        $response = $this->get('/request');

        $response->assertStatus(200);
    }

    public function testRequest()
    {
        $response = $this->post('/request');
        $response->assertLocation('http://localhost/request');
    }
}
