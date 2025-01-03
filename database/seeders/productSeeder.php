<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Silla Gamer Razer Enki hasta 136 Kg Negro',
                'price' => 9554.44,
                'qty' => 40,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'Gabinete Cooler Master MasterBox Q300L V2 ',
                'price' => 1499.00,
                'qty' => 25,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'Fuente de Poder Corsair RM750x 750W 80 Plus Gold',
                'price' => 1899.00,
                'qty' => 30,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'Procesador AMD Ryzen 5 5600X',
                'price' => 4999.00,
                'qty' => 20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'Memoria RAM G.Skill Trident Z RGB 16GB (2x8GB) DDR4 3200MHz',
                'price' => 2999.00,
                'qty' => 50,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'Tarjeta Gráfica NVIDIA GeForce RTX 3070 Ti',
                'price' => 17999.00,
                'qty' => 15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'Disco Duro SSD Samsung 970 EVO Plus 1TB NVMe M.2',
                'price' => 4999.00,
                'qty' => 35,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'Tarjeta Madre MSI MPG B550 Gaming Edge WiFi',
                'price' => 3799.00,
                'qty' => 25,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'Monitor ASUS TUF Gaming VG27AQ 27”',
                'price' => 10999.00,
                'qty' => 20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'Teclado Mecánico HyperX Alloy FPS Pro',
                'price' => 1999.00,
                'qty' => 60,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
        ]);
    }
}
