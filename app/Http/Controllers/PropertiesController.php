<?php

namespace App\Http\Controllers;
use App\Models\property;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class PropertiesController extends Controller
{

    public function index()
    {
        $properties=DB::table('properties')

            ->orderby('num')
            ->select(
                'num',
                'property',
                'characteristic',
                'home',
                'weakness',



            )->get();
        return view('properties.index',['properties'=>$properties]);
    }

    public function create()
    {

        return view('properties.create');
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

        $temp=property::findorfail($id);



        return view('properties.edit',['properties'=>$temp]);
    }

    public function show($id)
    {
        $temp=property::findorfail($id);
        if ($temp==null)
            return"No Find";
        //$property=$temp->toArray();


        $pokemons=$temp->pokemons;


        return view('properties.show',['property'=>$temp,'pokemons'=>$pokemons]);
    }
    public function store(Request $request)
    {
        $property = $request ->input('property');
        $characteristic = $request ->input('characteristic');
        $home = $request ->input('home');
        $weakness = $request ->input('weakness');
        property::create([

            'property'=>$property,
            'characteristic'=>$characteristic,
            'home'=>$home,
            'weakness'=>$weakness,

            'created_at'=>Carbon::now() ,
            'updated_at'=>Carbon::now()]);

        return redirect('properties');
    }
    public function update($id,Request $request){

        $temp=property::findorfail($id);
        $temp->property = $request ->input('name');
        $temp->characteristic = $request ->input('characteristic');
        $temp->home = $request ->input('home');
        $temp->weakness = $request ->input('weakness');
        $temp->save();
        return redirect('properties');
    }
    public function destory($id)
    {
        $property=property::findorfail($id);
        $property->delete();
        return redirect('properties');
    }
}
