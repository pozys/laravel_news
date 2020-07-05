<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeedbackTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRoot()
    {
        $response = $this->get('/feedback');

        $response->assertStatus(200);
    }

    public function testFeedback(){
        $response = $this->get('/feedback');
        $response->assertViewIs('feedback');

        $response = $this->post('/feedback');
        $response->assertStatus(302);
        $response->assertHeader('Content-Type', $value='text/html; charset=UTF-8');
    }
}
