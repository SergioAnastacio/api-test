<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'name' => 'Silla Gamer Corsair T3 Rush Gaming 2023 Carbón',
                'price' => 5811.00,
                'qty' => 50,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'Gabinete Batauro Meteor con Ventana Vidrio Templado Micro-ATX/Mid-Tower Sin Fuente 4 x 120mm Ventiladores ARGB Instalados Blanco',
                'price' => 1069.00,
                'qty' => 20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'Nobreak Cyberpower 550Va Ecologic',
                'price' => 2051.00,
                'qty' => 15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'Procesador Intel Core Ultra 5 245K con Intel Graphics FCLGA1851 5.20GHz 14 Núcleos 24MB Caché Ultra Series 2 Arrow Lake',
                'price' => 6904.00,
                'qty' => 33,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'Memoria Ram Corsair Dominator Platinum White DDR4 4000MHz 16GB (2 x 8Gb) Cl19 Xmp',
                'price' => 4310.00,
                'qty' => 50,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'Memoria Ram Corsair Dominator Platinum Black DDR4 4000MHz 32GB (2 x 16Gb) Cl19 Xmp',
                'price' => 8955.61,
                'qty' => 50,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'Tarjeta Madre Asus Prime Z690-P LGA 1700 ATX',
                'price' => 3999.00,
                'qty' => 50,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'Tarjeta Madre Asus Prime Z690-P LGA 1700 ATX',
                'price' => 3999.00,
                'qty' => 50,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'Tarjeta Madre Asus Prime Z690-P LGA 1700 ATX',
                'price' => 3999.00,
                'qty' => 50,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'Tarjeta Madre Asus Prime Z690-P LGA 1700 ATX',
                'price' => 3999.00,
                'qty' => 50,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
        ]);
    }
}
