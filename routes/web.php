<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonsController;
use App\Http\Controllers\PropertiesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('pokemons', [PokemonsController::class, 'index'])->name('pokemon.index');

Route::get('pokemons/create', [PokemonsController::class, 'create'])->name('pokemon.create');


Route::get('pokemons/{id}', [PokemonsController::class, 'show'])->where('id', '[0-9]+')->name('pokemon.show');

Route::get('pokemons/{id}/edit', [PokemonsController::class, 'edit'])->where('id', '[0-9]+')->name('pokemon.edit');





// 查詢
Route::get('properties', [PropertiesController::class, 'index'])->name('properties.index');

Route::get('properties/create', [PropertiesController::class, 'create'])->name('property.create');


Route::get('properties/{id}', [PropertiesController::class, 'show'])->where('id', '[0-9]+')->name('properties.show');

Route::get('properties/{id}/edit', [PropertiesController::class, 'edit'])->where('id', '[0-9]+')->name('properties.edit');
