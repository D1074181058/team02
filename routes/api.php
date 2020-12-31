<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PokemonsController;
use App\Http\Controllers\PropertiesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);


/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::get('properties', [PropertiesController::class, 'api_properties']);

    Route::patch('properties', [PropertiesController::class, 'api_update']);

    Route::delete('properties', [PropertiesController::class, 'api_delete']);

    Route::get('pokemons', [PokemonsController::class, 'api_pokemons']);


    Route::patch('pokemons', [PokemonsController::class, 'api_update']);

    Route::delete('pokemons', [PokemonsController::class, 'api_delete']);

});
