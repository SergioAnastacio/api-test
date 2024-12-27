<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase; //* Reset database after each test
    /**
     * A basic feature test example.
     */
    public function test_user_login(): void
    {
        $user=User::factory()->create([
            'email' => 'admin@digitalife.com.mx',
            'password' => bcrypt('digitalife'),
        ]);


        $response = $this->post('/api/login',[
            'email' => 'admin@digitalife.com.mx',
            'password' => 'digitalife',
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['access_token','token_type']);

    }
}
