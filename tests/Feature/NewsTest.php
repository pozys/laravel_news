<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRoot()
    {
        $response = $this->get('/news/1');

        $response->assertStatus(200);
    }

    public function testNews(){
        $response = $this->get('/news/1');
        $response->assertViewHas('news');
    }
}
