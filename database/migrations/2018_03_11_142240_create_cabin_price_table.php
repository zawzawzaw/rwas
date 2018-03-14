<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCabinPriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabin_price', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cabin_id')->nullable();
            $table->string('card_type');
            $table->string('pax_type_code');
            $table->string('gp');
            $table->string('rwcc');
            $table->string('exec_pax');
            $table->string('holiday_charge');
            $table->string('promo_code');
            $table->timestamps();

            $table->index('cabin_id');
            
            $table->foreign('cabin_id')->references('id')->on('cabins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cabin_price');
    }
}
