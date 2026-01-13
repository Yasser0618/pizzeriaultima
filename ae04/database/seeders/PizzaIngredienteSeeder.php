<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\Pizza;
use app\Models\Ingrediente;

class PizzaIngredienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $pizzaMargarita = Pizza::where('nombre','Margarita');
        $pizzaCuatroQuesos = Pizza::where('nombre','CuatroQuesos');
        $pizzaPrimavera = Pizza::where('nombre','Primavera');

        $mozzarela= Ingrediente::where(['nombre' => 'Mozzarela']);
        $parmesano=Ingrediente::where(['nombre' => 'Parmesano']);
        $gorgonzola=Ingrediente::where(['nombre' => 'Gorgonzola']);
        $provolone=Ingrediente::where(['nombre' => 'Provolones']);
        $tomate=Ingrediente::where(['nombre' => 'Tomate']);
        $rucula=Ingrediente::where(['nombre' => 'Rúcula']);

        $pizzaMargarita->ingredientes()->attach([$tomate->id,$mozzarela->id]);
        $pizzaCuatroQuesos->ingredientes()->attach([$tomate->id,$mozzarela->id,$gorgonzola->id,$provolone->id]);
        $pizzaPrimavera->ingredientes()->attach([$tomate->id,$mozzarela->id,$rucula->id]);
    }
}
