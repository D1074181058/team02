<?php

namespace App\Http\Controllers;
use App\Models\properties;

use Illuminate\Http\Request;


class PropertiesController extends Controller
{

    public function index()
    {
        $properties=properties::all();
        return view('properties.index',['properties'=>$properties]);
    }

    public function create()
    {
        $property=properties::create([
            'property'=>'無',
            'characteristic'=>'適應',
            'home'=>'黏稠濕地',
            'weakness'=>'無',
            'created_at'=>Carbon::now() ,
            'updated_at'=>Carbon::now()]);
        return view('properties.create',$property->toArray());
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
        $temp=properties::findorfail($id);
        if ($temp==null)
            return"No Find";
        $property=$temp->toArray();

        return view('properties.edit',$property);
    }

    public function show($id)
    {
        $temp=properties::findorfail($id);
        if ($temp==null)
            return"No Find";
        $property=$temp->toArray();
        return view('properties.show',$property);
    }


}
