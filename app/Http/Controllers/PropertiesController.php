<?php

namespace App\Http\Controllers;
use App\Models\pokemon;
use App\Models\property;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class PropertiesController extends Controller
{

    public function index()
    {
        $properties=property::all();

        $positions = property::Positions()->get();

        $data=[];

        foreach ($positions as $home)
        {
            $data["$home->home"]=$home->home;
        }

        return view('properties.index',['properties'=>$properties,'positions'=>$data]);
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
    public function store(\App\Http\Requests\CreatePropertyRequest $request)
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
    public function update($id,\App\Http\Requests\CreatePropertyRequest $request){

        $temp=property::findorfail($id);
        $temp->property = $request ->input('property');
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
    public function Positions(Request $request)
    {

        $properties=property::Position($request->input('PR'))->get();
        $positions=property::Positions()->get();
        $data=[];

        foreach ($positions as $home)
        {
            $data["$home->home"]=$home->home;
        }
        return view('properties.index',['properties'=>$properties,'positions'=>$data]);
    }



    public function api_properties(){
        return property::all();
    }
    public function api_update(Request $request)
    {
        $property = property::find($request->input('num'));

        if ($property  == null)
        {
            return response()->json([
                'status' => 0,
            ]);
        }

        $property->property = $request->input('property');
        $property->characteristic = $request->input('characteristic');
        $property->home = $request->input('home');
        $property->weakness = $request->input('weakness');


        if ($property->save())
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
        $property = property::find($request->input('num'));

        if (property == null)
        {
            return response()->json([
                'status' => 0,
            ]);
        }

        if ($property->delete())
        {
            return response()->json([
                'status' => 1,
            ]);
        }
    }




}
