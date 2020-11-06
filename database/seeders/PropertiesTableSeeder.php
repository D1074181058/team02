<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function ranhome()
    {
        $home=['燃燒地帶','水中','樹林','導電場所','岩石地帶','森林','草原','骯髒場所','競技場','寒冷地帶','陰暗角落','洞窟','無固定場所'];

        return $home[rand(0,count($home)-1)];
    }
    public function ranproperty()
    {
        $property=['水','火','草','電','地面','蟲','一般','毒','格鬥','冰','幽靈','超能','龍','鋼','惡'];

        return $property[rand(0,count($property)-1)];

    }
    public function ranch()
    {
        $characteristic=['高溫','濕氣','茂盛','靜電','堅實','適應力','溫馴','惡臭','好戰','低溫','漂浮','精神力','壓迫感','堅硬','夢魘'];
        return $characteristic[rand(0,count($characteristic)-1)];
    }

    public function run()
    {
        for($i=0;$i<15;$i++) {
            $property = $this->ranproperty();
            $characteristic = $this->ranch();
            $home = $this->ranhome();
            $weakness = $this->ranch();
            $datetime = Carbon::now()->subMinutes(rand(1, 55));


            DB::table('properties')->insert([
                'property' => $property,
                'characteristic' => $characteristic,
                'home' => $home,
                'weakness' => $weakness,
                'created_at' => $datetime,
                'updated_at' => $datetime
            ]);
        }
    }
}
