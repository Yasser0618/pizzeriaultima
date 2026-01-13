<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pizza;
use App\Models\Ingrediente;

class PizzaIngredienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pizzaMargarita = Pizza::where('nombre', 'Margarita')->first();
        $pizzaCuatroQuesos = Pizza::where('nombre', 'CuatroQuesos')->first();
        $pizzaPrimavera = Pizza::where('nombre', 'Primavera')->first();

        $ingredienteMozzarella = Ingrediente::where('nombre', 'Mozzarela')->first();
        $ingredienteParmensano = Ingrediente::where('nombre', 'Parmesano')->first();
        $ingredienteGorgonzola = Ingrediente::where('nombre', 'Gorgonzola')->first();
        $ingredienteProvolone = Ingrediente::where('nombre', 'Provolones')->first();
        $ingredienteTomate = Ingrediente::where('nombre', 'Tomate')->first();
        $ingredienteRucula = Ingrediente::where('nombre', 'Rúcula')->first();

        $pizzaMargarita->ingredientes()->attach([$ingredienteTomate->id, $ingredienteMozzarella->id]);
        $pizzaCuatroQuesos->ingredientes()->attach([$ingredienteTomate->id, $ingredienteMozzarella->id, $ingredienteParmensano->id, $ingredienteGorgonzola->id, $ingredienteProvolone->id]);
        $pizzaPrimavera->ingredientes()->attach([$ingredienteTomate->id, $ingredienteMozzarella->id, $ingredienteRucula->id]);
    }
}
