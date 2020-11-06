<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemons', function (Blueprint $table) {
            $table->id('num_ID')->comment('編號');
            $table->string('name',10)->comment('神奇寶貝');

            $table->foreignId('pr_ID')->comment('派系編號');


            $table->float('height',)->comment('身高');
            $table->float('weight',)->comment('體重');
            $table->string('growing',1)->comment('進化可能');
            $table->string('group',10)->comment('地區');
            $table->string('place',10)->comment('出現場所');


            $table->foreign('pr_ID')->references('num')->on('properties')->onDelete('cascade');



            $table->timestamps();
            $table->timestamp('delete_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokemons');
    }
}
