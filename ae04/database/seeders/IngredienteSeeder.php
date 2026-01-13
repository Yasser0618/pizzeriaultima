<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\Ingrediente;

class IngredienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Ingrediente::create(['nombre' => 'Mozzarela']);
        Ingrediente::create(['nombre' => 'Parmesano']);
        Ingrediente::create(['nombre' => 'Gorgonzola']);
        Ingrediente::create(['nombre' => 'Provolones']);
        Ingrediente::create(['nombre' => 'Tomate']);
        Ingrediente::create(['nombre' => 'Rúcula']);
    }
}
