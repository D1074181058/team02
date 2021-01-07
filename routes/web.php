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

Route::get('pokemons/Group', [PokemonsController::class, 'Group'])->name('pokemon.Group');

Route::post('pokemons/Positions', [PokemonsController::class, 'Positions'])->name('pokemon.Positions');

Route::get('pokemons/{id}', [PokemonsController::class, 'show'])->where('id', '[0-9]+')->name('pokemon.show');

Route::get('pokemons/{id}/edit', [PokemonsController::class, 'edit'])->where('id', '[0-9]+')->name('pokemon.edit');

Route::post('pokemons/store', [PokemonsController::class, 'store'])->name('pokemon.store');

Route::patch('pokemons/update/{id}', [PokemonsController::class, 'update'])->where('id', '[0-9]+')->name('pokemon.update');

Route::delete('pokemons/delete/{id}', [PokemonsController::class, 'destory'])->where('id', '[0-9]+')->name('pokemon.destory');


// 查詢
Route::get('properties', [PropertiesController::class, 'index'])->name('properties.index');

Route::get('properties/create', [PropertiesController::class, 'create'])->name('property.create');

Route::post('properties/Positions', [PropertiesController::class, 'Positions'])->name('properties.Positions');

Route::get('properties/{id}', [PropertiesController::class, 'show'])->where('id', '[0-9]+')->name('properties.show');

Route::get('properties/{id}/edit', [PropertiesController::class, 'edit'])->where('id', '[0-9]+')->name('properties.edit');

Route::post('properties/store', [PropertiesController::class, 'store'])->name('properties.store');

Route::patch('properties/update/{id}', [PropertiesController::class, 'update'])->where('id', '[0-9]+')->name('properties.update');

Route::delete('properties/delete/{id}', [PropertiesController::class, 'destory'])->where('id', '[0-9]+')->name('properties.destory');
