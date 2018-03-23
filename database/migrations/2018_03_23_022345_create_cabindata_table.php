<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCabindataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabindata', function (Blueprint $table) {
            $table->increments('id');
            $table->text('cabin_code');
            $table->text('cabin_type');
            $table->text('cabin_type_en');
            $table->text('cabin_type_zh_Hans');
            $table->text('cabin_type_zh_Hant');
            $table->text('key');
            $table->text('ship_code');
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
        Schema::dropIfExists('cabindata');
    }
}
