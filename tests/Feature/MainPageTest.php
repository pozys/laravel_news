<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MainPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRoot()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testWelcomePage()
    {
        $response = $this->get('/');
        $response->assertViewIs('news.index');
        $response->assertSessionHasNoErrors();
    }
}
