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
            $table->unsignedInteger('itinerary')->nullable();
            $table->date('departure_date')->nullable();
            $table->string('cruise_id')->nullable();
            $table->string('week_day')->nullable();
            $table->timestamps();

            $table->index('itinerary');

            $table->foreign('itinerary')->references('id')->on('itinerary')->onDelete('cascade');
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
