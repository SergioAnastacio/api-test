<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServerStatusTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_server_status(): void
    {
        $response = $this->get('/api/up');
        $response->assertStatus(200);
        $response->assertJson(['status' => 'OK']);
    }
}
