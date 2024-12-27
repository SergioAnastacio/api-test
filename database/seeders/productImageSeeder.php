<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_images')->insert([
            [
                'product_id' => 1,
                'original_url' => 'images/product1_image1.jpg',
                'url' => 'images/product1_image1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'product_id' => 2,
                'original_url' => 'images/product2_image1.jpg',
                'url' => 'images/product2_image1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'product_id' => 3,
                'original_url' => 'images/product3_image1.jpg',
                'url' => 'images/product3_image1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'product_id' => 4,
                'original_url' => 'images/product4_image1.jpg',
                'url' => 'images/product4_image1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'product_id' => 5,
                'original_url' => 'images/product5_image1.jpg',
                'url' => 'images/product5_image1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'product_id' => 6,
                'original_url' => 'images/product6_image1.jpg',
                'url' => 'images/product6_image1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'product_id' => 7,
                'original_url' => 'images/product7_image1.jpg',
                'url' => 'images/product7_image1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'product_id' => 8,
                'original_url' => 'images/product8_image1.jpg',
                'url' => 'images/product8_image1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'product_id' => 9,
                'original_url' => 'images/product9_image1.jpg',
                'url' => 'images/product9_image1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'product_id' => 10,
                'original_url' => 'images/product10_image1.jpg',
                'url' => 'images/product10_image1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
        ]);
    }
}
