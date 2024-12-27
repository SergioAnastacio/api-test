<?php

namespace Tests\Feature;

use App\Models\product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;


use Tests\TestCase;

/**
 * @group exclude
 */
class ProductTest extends TestCase
{
    use RefreshDatabase; //* Reset database after each test
    /**
     * A basic feature test example.
     */
    public function test_product_route_index(): void
    {
        $user=User::factory()->create();
        $token=$user->createToken('test')->plainTextToken;
        $response=$this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->get('/api/products');


        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'price',
                    'qty',
                    'images' => [
                        '*' => [
                            'id',
                            'url',
                        ],
                    ],
                    'created_at',
                    'updated_at',
                ],
            ],
        ]);
    }
    public function test_product_route_store(): void
    {
        $user=User::factory()->create();
        $token=$user->createToken('test')->plainTextToken;
        $response=$this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->post('/api/products', [
            'name' => 'Product test',
            'price' => 100,
            'qty' => 10,
        ]);


        $response->assertStatus(202);
        $response->assertJsonStructure([
            'message',
        ]);
    }
    public function test_product_route_update(): void
    {
        $user=User::factory()->create();
        $token=$user->createToken('test')->plainTextToken;
        $product= product::factory()->create([
            'name' => 'Original Product',
            'price' => 100,
            'qty' => 10,
        ]);
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->patch('/api/products/' . $product->id, [
            'name' => '12testing multiple',
            'price' => 1200,
            'qty' => 10,
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'id',
            'name',
            'price',
            'qty',
            'created_at',
            'updated_at',
            'deleted_at',
        ]);
    }
    public function test_product_route_delete(): void
    {
        $user=User::factory()->create();
        $token=$user->createToken('test')->plainTextToken;
        $product= product::factory()->create([
            'name' => 'Original Product',
            'price' => 100,
            'qty' => 10,
        ]);
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->delete('/api/products/' . $product->id, [
            'name' => '12testing multiple',
            'price' => 1200,
            'qty' => 10,
        ]);

        $response->assertStatus(204);
    }

}
