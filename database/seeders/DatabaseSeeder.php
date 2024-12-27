<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //* create a default user
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@digitalife.com.mx',
            'password'=> bcrypt('digitalife'),
        ]);
        //* LocalDevelopmentSeeder for product and productImages
        //* Images are stored on VueJS public folder
        $this->call([
            ProductSeeder::class,
        ]);
        $this->call([
            ProductImageSeeder::class,
        ]);
    }
}
