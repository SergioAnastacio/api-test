<?php

namespace Tests\Unit;

use App\Models\productImages;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class ProductImagesCreationTest extends TestCase
{
    use RefreshDatabase; //* Reset database after each test
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $productImage= new productImages([
            'product_id' => 1,
            'original_url' => 'https://example.com/image.jpg',
            'url' => 'images/image.jpg',
        ]);

        $this->assertEquals(1, $productImage->product_id);
        $this->assertEquals('https://example.com/image.jpg', $productImage->original_url);
        $this->assertEquals('images/image.jpg', $productImage->url);

    }
}
