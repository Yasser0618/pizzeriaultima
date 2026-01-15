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

    public function create(){
        return view('ingredientes.create');
    }

    public function store(Request $request){
        $request -> validate([
            'nombre' => 'required'
        ],
        [
            'nombre.required' => 'El nombre es obligatorio'
        ]);

        $ingrediente = Ingrediente::create($request->only([
            'nombre'
        ]));

        return redirect() -> route('ingredientes.showAllIngredientes');
    }

    public function edit($id){
        $ingrediente = Ingrediente::findOrFail($id);
        return view('ingredientes.edit', compact('ingrediente'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required'
        ],
        [
            'nombre.required' => 'El nombre es obligatorio'
        ]);

        $ingrediente = Ingrediente::findOrFail($id);

        $ingrediente->update($request->only([
            'nombre'
        ]));

        return redirect() -> route('ingredientes.showAllIngredientes');
    }

    public function confirmDelete(Ingrediente $ingrediente){
        return view('ingredientes.confirmDelete', compact('ingrediente'));
    }

    public function destroy(Ingrediente $ingrediente){
        $ingrediente->delete();

        return redirect()
            ->route('ingredientes.showAllIngredientes')
            ->with('succes', 'Ingrediente eliminado con exito');
    }
}
