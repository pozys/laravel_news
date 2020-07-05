<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRoot()
    {
        $response = $this->get('/categories');

        $response->assertStatus(200);
    }

    public function testMenu(){
        $response = $this->get('/categories/10000000000000');
        $response->assertSeeText('Указан некорректный id категории.');
    }
}
