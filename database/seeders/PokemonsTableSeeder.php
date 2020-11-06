<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class PokemonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function string($length)
    {
        $characters='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charleght=strlen($characters);
        $randstr='';
        for($i=0;$i<$length;$i++){
            $randstr .=$characters[rand(0,$charleght-1)];
        }
        return $randstr;
    }
    public function ranname()
    {
        $firstname=$this->string(rand(3,10));
        $firstname=strtolower($firstname);
        $firstname=ucfirst($firstname)  ;
       /** $lastname=$this->string(rand(2,15));
        $lastname=strtolower($lastname);
        $lastname=ucfirst($lastname)  ;**/
        $name=$firstname;
        return $name;
    }

    public function ranplace()
    {
        $place=['山脈和活火山','無固定場所','淡水池塘和湖泊','空間狹縫','潮濕環境','海洋','草原','森林','雷雲','沙漠'
            ,'城鎮郊區','懸崖','雪山','陰暗處','毀壞的世界','臭氧層','夢幻大地','洞窟'];
        return $place[rand(0,count($place)-1)];
    }

    public function rangroup()
    {
        $group=['關都','城都','阿羅拉','卡洛斯','神奧','豐緣','合眾','七之島','鎧島'];
        return $group[rand(0,count($group)-1)];
    }

    public function rangrowing()
    {
        $growing=['是','否'];
        return $growing[rand(0,count($growing)-1)];
    }

    public function run()
    {
        for($i=1;$i<=50;$i++)
        {
            $name=$this->ranname();
            $growing =$this->rangrowing();
            $group=$this->rangroup();
            $place=$this->ranplace();
            $datetime=Carbon::now()->subMinutes(rand(1,55));

            DB::table('pokemons')->insert([
                'num_ID'=>$i,
                'name'=>$name,
                'pr_ID'=>rand(1,15),
                'height'=>rand(1,10),
                'weight'=>rand(1,500),
                'growing'=>$growing,
                'group'=>$group,
                'place'=>$place,
                'created_at'=>$datetime,
                'updated_at'=>$datetime
            ]);
        }
    }
}
