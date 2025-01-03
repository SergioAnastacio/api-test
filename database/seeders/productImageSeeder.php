<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
                'original_url' => 'http://media.digitalife.com.mx/products/46874/63973cdd63aeb.jpg',
                'url' => 'http://media.digitalife.com.mx/products/46874/63973cdd63aeb.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'product_id' => 2,
                'original_url' => 'https://media.digitalife.com.mx/products/52774/66298477624b0.webp',
                'url' => 'https://media.digitalife.com.mx/products/52774/66298477624b0.webp',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'product_id' => 3,
                'original_url' => 'https://media.digitalife.com.mx/products/52853/662adbea8a072.jpg',
                'url' => 'https://media.digitalife.com.mx/products/52853/662adbea8a072.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'product_id' => 4,
                'original_url' => 'https://media.digitalife.com.mx/5fc9b15755221.png',
                'url' => 'https://media.digitalife.com.mx/5fc9b15755221.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'product_id' => 5,
                'original_url' => 'https://media.digitalife.com.mx/products/25914/609731c2dcb42.webp',
                'url' => 'https://media.digitalife.com.mx/products/25914/609731c2dcb42.webp',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'product_id' => 6,
                'original_url' => 'https://media.digitalife.com.mx/products/43286/6260bda2a6f58.webp',
                'url' => 'https://media.digitalife.com.mx/products/43286/6260bda2a6f58.webp',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'product_id' => 7,
                'original_url' => 'https://media.digitalife.com.mx/products/41694/61d8c4bec7818.webp',
                'url' => 'https://media.digitalife.com.mx/products/41694/61d8c4bec7818.webp',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'product_id' => 8,
                'original_url' => 'https://media.digitalife.com.mx/products/27757/60976c63b9482.webp',
                'url' => 'https://media.digitalife.com.mx/products/27757/60976c63b9482.webp',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'product_id' => 9,
                'original_url' => 'https://media.digitalife.com.mx/products/_0005_VG27AQ_1.jpg',
                'url' => 'https://media.digitalife.com.mx/products/_0005_VG27AQ_1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'product_id' => 10,
                'original_url' => 'https://media.digitalife.com.mx/products/HXKB4BL1USWW_1.jpg',
                'url' => 'https://media.digitalife.com.mx/products/HXKB4BL1USWW_1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
        ]);
    }
}
