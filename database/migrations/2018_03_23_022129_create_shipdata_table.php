<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipdataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipdata', function (Blueprint $table) {
            $table->increments('id');
            $table->text('ship_code');
            $table->text('ship_code_drs');
            $table->text('en');
            $table->text('zh_Hans');
            $table->text('zh_Hant');
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
        Schema::dropIfExists('shipdata');
    }
}
