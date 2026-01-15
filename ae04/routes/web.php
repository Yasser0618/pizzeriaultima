<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\IngredienteController;

Route::get('/', [PizzaController::class, 'showAllPizzas'])->name('pizzas.showAllPizzas');
Route::get('/pizza/{id}', [PizzaController::class, 'showOnePizza'])->name('pizzas.showOnePizza');

Route::post('/pizzas/store', [PizzaController::class, 'store'])->name('pizzas.store');
Route::get('/pizzas/create', [PizzaController::class, 'create'])->name('pizzas.create');

Route::get('/pizzas/{id}/edit', [PizzaController::class, 'edit'])->name('pizzas.edit');
Route::put('/pizzas/{id}', [PizzaController::class, 'update'])->name('pizzas.update');

Route::get('/pizzas/confirm/{pizza}', [PizzaController::class, 'confirmDelete'])->name('pizzas.confirmDelete');
Route::delete('/pizzas/destroy/{pizza}', [PizzaController::class, 'destroy'])->name('pizzas.destroy');

Route::get('/ingredientes', [IngredienteController::class, 'showAllIngredientes'])->name('ingredientes.showAllIngredientes');
Route::get('/ingrediente/{id}', [IngredienteController::class, 'showOneIngrediente'])->name('ingredientes.showOneIngrediente');

Route::post('/ingredientes/store', [IngredienteController::class, 'store'])->name('ingredientes.store');
Route::get('/ingredientes/create', [IngredienteController::class, 'create'])->name('ingredientes.create');

Route::get('/ingredientes/{id}/edit', [IngredienteController::class, 'edit'])->name('ingredientes.edit');
Route::put('/ingredientes/{id}', [IngredienteController::class, 'update'])->name('ingredientes.update');

Route::get('/ingredientes/confirm/{ingrediente}', [IngredienteController::class, 'confirmDelete'])->name('ingredientes.confirmDelete');
Route::delete('/ingredientes/destroy/{ingrediente}', [IngredienteController::class, 'destroy'])->name('ingredientes.destroy');