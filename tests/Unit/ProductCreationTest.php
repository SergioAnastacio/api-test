<?php

namespace Tests\Unit;

use App\Models\product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class ProductCreationTest extends TestCase
{
    use RefreshDatabase; //* Reset database after each test
    /**
     * A basic unit test example.
     */
    public function test_product_creation(): void
    {
        $product = new product([
            'name' => 'Test Product',
            'price' => 100,
            'qty' => 10,
        ]);

        $this->assertEquals('Test Product', $product->name);
        $this->assertEquals(100, $product->price);
        $this->assertEquals(10, $product->qty);
    }
}
