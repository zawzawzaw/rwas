<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIteneraryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itinerary', function (Blueprint $table) {
            $table->increments('id');
            $table->string('itin_code');
            $table->string('itin_name');
            $table->string('ship_code');
            $table->string('sector');
            $table->unsignedInteger('day');
            $table->unsignedInteger('night');
            $table->string('departure_port')->nullable();
            $table->string('arrival_port')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itenerary');
    }
}
