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
            $data["$position->group"]=$position->group;
        }
        return view('pokemon.index',['pokemons'=>$pokemons,'positions'=>$data]);
    }

    public function create()
    {

        $pokemons=DB::table('properties')->
            orderby('properties.num','asc')->
            select('properties.num','properties.property')->get();
        $data=[];
        $half=['是' => '是', '否' => '否'];
        $place=['關都'=>'關都','城都'=>'城都','豐緣'=>'豐緣','神奧'=>'神奧','合眾'=>'合眾','卡洛斯'=>'卡洛斯','阿羅拉'=>'阿羅拉','鎧島'=>'鎧島'];
        foreach ($pokemons as $pokemon)
        {
            $data["$pokemon->num"]=$pokemon->property;
        }
        return view('pokemon.create',['positions'=>$data,'half'=>$half,'place'=>$place]);

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

        $half=[
            '是' => '是',
            '否' => '否'
        ];
        $place=['關都'=>'關都','城都'=>'城都','豐緣'=>'豐緣','神奧'=>'神奧','合眾'=>'合眾','卡洛斯'=>'卡洛斯','阿羅拉'=>'阿羅拉','鎧島'=>'鎧島'];
        foreach ($pokemons as $pokemon)
        {
            $data["$pokemon->num"]=$pokemon->property;
        }
        $temp=pokemon::findorfail($id);

        return view('pokemon.edit',['pokemon'=>$temp,'positions'=>$data,'half'=>$half,'place'=>$place]);
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
    public function update($id ,\App\Http\Requests\CreatePokemonRequest $request)
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

        $pokemons=pokemon::Position($request->input('PM'))->get();
        $positions=pokemon::Positions()->get();
        $data=[];

        foreach ($positions as $group)
        {
            $data["$group->group"]=$group->group;
        }
        return view('pokemon.index',['pokemons'=>$pokemons,'positions'=>$data]);
    }




    public function api_pokemons()
    {
        return pokemon::all();
    }

    public function api_update(Request $request)
    {
        $pokemon = pokemon::find($request->input('num_ID'));

        if ($pokemon  == null)
        {
            return response()->json([
                'status' => 0,
            ]);
        }

        $pokemon->name = $request->input('name');
        $pokemon->pr_ID = $request->input('pr_ID');
        $pokemon->height = $request->input('height');
        $pokemon->weight = $request->input('weight');
        $pokemon->growing = $request->input('growing');
        $pokemon->group = $request->input('group');
        $pokemon->place = $request->input('place');

        if ($pokemon->save())
        {
            return response()->json([
                'status' => 1,
            ]);
        } else {
            return response()->json([
                'status' => 0,
            ]);
        }
    }
    public function api_delete(Request $request)
    {
        $pokemon = pokemon::find($request->input('num_ID'));

        if (pokemon == null)
        {
            return response()->json([
                'status' => 0,
            ]);
        }

        if ($pokemon->delete())
        {
            return response()->json([
                'status' => 1,
            ]);
        }
    }
}
