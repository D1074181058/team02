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
        $property=property::create([
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

        $temp=property::findorfail($id);
        if ($temp==null)
            return"No Find";
        $temp->property='無';
        $temp->characteristic='隨和';
        $temp->home='各地';
        $temp->weakness='無';
        $temp->save();
        $property=$temp->toArray();

        return view('properties.edit',$property);
    }

    public function show($id)
    {
        $temp=property::findorfail($id);
        if ($temp==null)
            return"No Find";
        $property=$temp->toArray();
        return view('properties.show',$property);
    }


}
