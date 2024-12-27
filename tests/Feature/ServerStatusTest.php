<?php

namespace Tests\Feature;

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
