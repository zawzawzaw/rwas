<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCruiseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cruise', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ship_code')->nullable();
            $table->date('departure_date')->nullable();
            $table->string('cruise_id')->nullable();
            $table->string('week_day')->nullable();
            $table->string('sector')->nullable();
            $table->string('departure_port')->nullable();
            $table->string('arrival_port')->nullable();
            $table->string('itenerary_name')->nullable();
            $table->string('itinerary_code')->nullable();
            $table->unsignedInteger('day')->nullable();
            $table->unsignedInteger('night')->nullable();
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
        Schema::dropIfExists('cruise');
    }
}
