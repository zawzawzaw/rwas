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
            $table->string('ship_code');
            $table->date('departure_date');
            $table->string('cruise_id');
            $table->string('week_day');
            $table->string('sector');
            $table->string('cabin_category');
            $table->string('cabin_group');
            $table->integer('cabin_blocked');
            $table->integer('cabin_sold');
            $table->integer('cabin_available');
            $table->integer('pax_count');
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
