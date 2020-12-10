<?php

namespace App\Http\Controllers;
use App\Models\property;
use Carbon\Carbon;
use Illuminate\Http\Request;


class PropertiesController extends Controller
{

    public function index()
    {
        $properties=property::all();
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
        $property=$temp->toArray();
        return view('properties.show',$property);
    }
    public function store(Request $request)
    {
        $property = $request ->input('name');
        $characteristic = $request ->input('characteristic');
        $home = $request ->input('home');
        $weakness = $request ->input('weakness');


        $pokemon=pokemon::create([
            'name'=>$property,
            'pr_ID'=>$characteristic,
            'height'=>$home,
            'weight'=>$weakness,

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
