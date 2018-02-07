<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCabinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabins', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cruise')->nullable();
            $table->string('cabin_category')->nullable();
            $table->string('cabin_group')->nullable();
            $table->string('cabin_blocked')->nullable();
            $table->string('cabin_sold')->nullable();
            $table->string('cabin_available')->nullable();
            $table->string('pax_count')->nullable();
            $table->timestamps();

            $table->index('cruise');

            $table->foreign('cruise')->references('id')->on('cruise')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cabins');
    }
}
