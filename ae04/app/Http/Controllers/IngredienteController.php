<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingrediente;

class IngredienteController extends Controller
{
    public function showAllIngredientes(){
        $ingredientes = Ingrediente::all();
        //$pizzas = Pizza::with('ingredientes') -> get();
        return view('ingredientes.showAllIngredientes', compact('ingredientes'));
    }

    //En este caso no se necesita este metodo porque no se listaran por individual los ingredientes
    /*
    public function showOneIngrediente($id){
        $ingrediente = Ingrediente::findOrFail($id);
        return view('ingredientes.showOneIngrediente', compact('ingrediente'));
    }
    */

}
