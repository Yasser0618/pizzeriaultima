<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaController extends Controller
{
    public function showAllPizzas(){
        $pizzas = Pizza::all();
        //$pizzas = Pizza::with('ingredientes') -> get();
        return view('pizzas.showAllPizzas', compact('pizzas'));
    }

    public function showOnePizza($id){
        $pizza = Pizza::with('ingredientes') -> findOrFail($id);
        return view('pizzas.showOnePizza', compact('pizza'));
    }
}
