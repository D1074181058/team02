<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id('num')->comment('編號');
            $table->string('property',3)->comment('派系');
            $table->string('characteristic',5)->comment('特性');
            $table->string('home',5)->comment('主場');
            $table->string('weakness',3)->comment('弱點屬性');

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
        Schema::dropIfExists('properties');
    }
}
