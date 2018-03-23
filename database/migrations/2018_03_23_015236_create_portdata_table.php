<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortdataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portdata', function (Blueprint $table) {
            $table->increments('id');
            $table->text('country');
            $table->text('en');
            $table->text('location_code');
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
        Schema::dropIfExists('portdata');
    }
}
