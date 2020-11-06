<?php

namespace App\Http\Controllers;
use App\Models\pokemon;
use App\Models\pokemons;
use Carbon\Carbon;
use Database\Seeders\PokemonsTableSeeder;

use Illuminate\Http\Request;


class PokemonsController extends Controller
{

    public function index()
    {
        $pokemons=pokemons::all();
        return view('pokemon.index',['pokemons'=>$pokemons]);
    }

    public function create()
    {
        $pokemon=pokemons::create([
            'name'=>'達克萊伊',
            'pr_ID'=>15,
            'height'=>1.5,
            'weight'=>'50.5',
            'growing'=>'否',
            'group'=>'神奧',
            'place'=>'無固定場所',
            'created_at'=>Carbon::now() ,
            'updated_at'=>Carbon::now()]);
        return view('pokemon.create',$pokemon->toArray());
    }
    public function edit($id)
    {
        /**if ($id == 5)
        {
            $player_name = "Sean";
            $player_country = "Taiwan";
            $player_position = "中鋒";
        } else {
            $player_name = "NBA 球員名字";
            $player_country = "USA";
            $player_position = "前鋒";
        }
        $data = compact('player_name', 'player_country', 'player_position');**/
       //onlyshow
        $temp=pokemon::findorfail($id);
        if ($temp==null)
            return"NO Find";
        $pokemon=$temp->toArray();

        return view('pokemon.edit',$pokemon);
    }

    public function show($id)
    {
        $temp=pokemon::findorfail($id);
        if ($temp==null)
            return"NO Find";
        $pokemon=$temp->toArray();
        return view('pokemon.show',$pokemon);
    }


}
