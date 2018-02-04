<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCabinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('cabins', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('ship_code')->nullable();
            $table->date('departure_date')->nullable();
            $table->string('cruise_id')->nullable();
            $table->string('week_day')->nullable();
            $table->string('sector')->nullable();
            $table->string('cabin_category')->nullable();
            $table->string('cabin_group')->nullable();
            $table->integer('cabin_blocked')->nullable();
            $table->integer('cabin_sold')->nullable();
            $table->integer('cabin_available')->nullable();
            $table->integer('pax_count')->nullable();
            $table->string('itinerary_code')->nullable();
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
        //
        Schema::dropIfExists('cabins');
    }
}
