<?php

namespace App\Http\Controllers;

use App\Models\pokemon;
use App\Models\property;
use Carbon\Carbon;
use Database\Seeders\PokemonsTableSeeder;
use App\Http\Requests\CreatePokemonRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PokemonsController extends Controller
{

    public function index()
    {
        /*$pokemons=DB::table('pokemons')
            ->join('properties' , 'pokemons.pr_ID' , '=' , 'properties.num')
            ->orderby('pokemons.num_ID')
            ->select(
                'pokemons.num_ID',
                'pokemons.name',
                'properties.property as property',
                'pokemons.height',
                'pokemons.weight',
                'pokemons.growing',
                'pokemons.group',
                'pokemons.place',

            )->get();
        */
        $pokemons=pokemon::all();
        $positions=pokemon::Positions()->get();
        $data=[];
        foreach ($positions as $position)
        {
            $data["$position->position"]=$position->position;
        }
        return view('pokemon.index',['pokemons'=>$pokemons,'positions'=>$data]);
    }

    public function create()
    {
        /*
        $pokemon=pokemon::create([
            'name'=>'達克萊伊',
            'pr_ID'=>15,
            'height'=>1.5,
            'weight'=>'50.5',
            'growing'=>'否',
            'group'=>'神奧',
            'place'=>'無固定場所',
            'created_at'=>Carbon::now() ,
            'updated_at'=>Carbon::now()]);
        */
        $pokemons=DB::table('properties')->
            orderby('properties.num','asc')->
            select('properties.num','properties.property')->get();
        $data=[];
        foreach ($pokemons as $pokemon)
        {
            $data["$pokemon->num"]=$pokemon->property;
        }
        return view('pokemon.create',['positions'=>$data]);

    }
    public function edit($id)
    {
        /*
        if ($id == 5)
        {
            $player_name = "Sean";
            $player_country = "Taiwan";
            $player_position = "中鋒";
        } else {
            $player_name = "NBA 球員名字";
            $player_country = "USA";
            $player_position = "前鋒";
        }
        $data = compact('player_name', 'player_country', 'player_position');
       onlyshow
        $temp=pokemon::findorfail($id);
        if ($temp==null)
            return"NO Find";


        $temp->name='百變怪';
        $temp->pr_ID=2;
        $temp->height=0.5;
        $temp->weight=10;
        $temp->growing='否';
        $temp->group='豐緣';
        $temp->place='泥沼';
        $temp->save();
        $pokemon=$temp->toArray();
         */
        $pokemons=DB::table('properties')->
        orderby('properties.num','asc')->
        select('properties.num','properties.property')->get();
        $data=[];
        foreach ($pokemons as $pokemon)
        {
            $data["$pokemon->num"]=$pokemon->property;
        }
        $temp=pokemon::findorfail($id);

        return view('pokemon.edit',['pokemon'=>$temp,'positions'=>$data]);
    }

    public function show($id)
    {
        /*$temp=pokemon::findorfail($id);
        if ($temp==null)
            return abort(404);
        $pokemon=$temp->toArray();*/

        $pokemon=pokemon::findOrFail($id);
        $property=property::findOrFail($pokemon->num_ID);

        return view('pokemon.show',['pokemons'=>$pokemon,'property_name'=>$property->property]);
    }
    public function store(\App\Http\Requests\CreatePokemonRequest $request)
    {
        //pokemon::create($request->all());


        $name = $request ->input('name');
        $pr_ID = $request ->input('pr_ID');
        $height = $request ->input('height');
        $weight = $request ->input('weight');
        $growing = $request ->input('growing');
        $group = $request ->input('group');
        $place = $request ->input('place');

        $pokemon=pokemon::create([
            'name'=>$name,
            'pr_ID'=>$pr_ID,
            'height'=>$height,
            'weight'=>$weight,
            'growing'=>$growing,
            'group'=>$group,
            'place'=>$place,
            'created_at'=>Carbon::now() ,
            'updated_at'=>Carbon::now()]);

        return redirect('pokemons');


    }
    public function update($id ,Request $request)
    {
        $temp=pokemon::findorfail($id);
        $temp->name = $request ->input('name');
        $temp->pr_ID = $request ->input('pr_ID');
        $temp->height = $request ->input('height');
        $temp->weight = $request ->input('weight');
        $temp->growing = $request ->input('growing');
        $temp->group = $request ->input('group');
        $temp->place = $request ->input('place');
        $temp->save();
        return redirect('pokemons');
    }
    public function destory($id)
    {
        $pokemon=pokemon::findorfail($id);
        $pokemon->delete();
        return redirect('pokemons');
    }
    public function Group()
    {
        $pokemons=pokemon::Group()->get();
        return view('pokemon.index',['pokemons'=>$pokemons]);
    }
    public function Positions(Request $request)
    {

        $pokemons=pokemon::position($request->input('PM'))->get();
        $positions=pokemon::positions()->get();
        $data=[];
        foreach ($positions as $group)
        {
            $data["$group->group"]=$group->group;
        }
        return view('pokemon.index',['pokemons'=>$pokemons,'positions'=>$data]);
    }

}
