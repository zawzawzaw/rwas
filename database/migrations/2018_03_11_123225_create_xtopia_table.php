<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXtopiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xtopia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('itinerary_code');
            $table->string('card_type');
            $table->string('cabin_code');
            $table->string('pax_type_code');
            $table->string('gp');
            $table->string('rwcc');
            $table->string('exec_pax');
            $table->string('holiday_charge');
            $table->string('ship_code');
            $table->string('promo_code');
            $table->date('dep_start');
            $table->date('dep_end');
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
        Schema::dropIfExists('xtopia');
    }
}
