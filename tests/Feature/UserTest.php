<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase; //* Reset database after each test
    /**
     * A basic feature test example.
     */
    public function test_user_route(): void
    {
        $user=User::factory()->create();
        $token=$user->createToken('test')->plainTextToken;
        $response=$this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->get('/api/user');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'email',
            ],
        ]);
    }
}
