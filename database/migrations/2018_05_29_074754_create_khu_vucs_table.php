<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhuVucsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khu_vucs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codeLocation');
            $table->string('nameLocation');
            $table->string('addressParkTaxi');
            $table->string('addressInputGasoline');
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
        Schema::dropIfExists('khu_vucs');
    }
}
