<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;
use App\Models\Ingrediente;

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

    //funcion para crear una pizza
    public function create(){
        $ingredientes = Ingrediente::all();
        return view('pizzas.create', compact('ingredientes'));
    }

    public function store(Request $request){ //El request recoge el formulario
        $request -> validate([ //validate hace la validacion de los campos
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'ingredientes' => 'required|array'
        ],
        [
            'nombre.required' => 'El nombre es obligatorio.',
            'descripcion.required' => 'La descripcion es obligatoria.',
            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser numerico.',
            'ingredientes.required' => 'Debes seleccionar al menos un ingrediente.',
            'ingredientes.array' => 'Los ingredientes no son validos.'
        ]);

        $pizza = Pizza::create($request->only([
            'nombre',
            'descripcion',
            'precio'
        ]));

        if ($request->has('ingredientes')){
            $pizza->ingredientes()->attach($request->ingredientes);
        }

        return redirect()->route('pizzas.showAllPizzas');//Completado el store nos devuelve a la pagina indicada
    }

    public function edit($id){
        $pizza = Pizza::with('ingredientes')->findOrFail($id);
        $ingredientes = Ingrediente::all();

        return view('pizzas.edit', compact('pizza', 'ingredientes'));
    }
    
    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'ingredientes' => 'required|array'
        ],
        [
            'nombre.required' => 'El nombre es obligatorio.',
            'descripcion.required' => 'La descripcion es obligatoria.',
            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser numerico.',
            'ingredientes.required' => 'Debes seleccionar al menos un ingrediente.',
            'ingredientes.array' => 'Los ingredientes no son validos.'
        ]);

        $pizza = Pizza::findOrFail($id);

        $pizza -> update($request->only([
            'nombre',
            'descripcion',
            'precio'
        ]));

        $pizza->ingredientes()->sync(
            $request->ingredientes ?? [] //Si el formulario de ingredientes esta vacio devuelve un array vacio
        );

        return redirect()->route('pizzas.showAllPizzas');
    }
    
    public function confirmDelete(Pizza $pizza){
        return view('pizzas.confirmDelete', compact('pizza'));
    }

    public function destroy(Pizza $pizza){
        $pizza->delete();

        return redirect()
            ->route('pizzas.showAllPizzas')
            ->with('succes', 'Pizza eliminada correctamente');//Crea la variable succes que contiene el texto
    }
}
