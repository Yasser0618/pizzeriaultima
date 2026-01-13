<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\Pizza;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Pizza::create(['nombre' => 'Margarita','descripcion' => 'La mejor pizza del mundo mundial','precio' => 10.50]);
        Pizza::create(['nombre' => 'CuatroQuesos','descripcion' => 'La segunda mejor pizza del mundo mundial','precio' => 11.50]);
        Pizza::create(['nombre' => 'Primavera','descripcion' => 'La tercera mejor pizza del mundo mundial','precio' => 12.50]);
    }
}
