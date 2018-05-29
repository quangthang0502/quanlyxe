<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhieuTiepNhienLieusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieu_tiep_nhien_lieus', function (Blueprint $table) {
            $table->increments('id');
            $table->time('time');
            $table->float('numberGasoline');
            $table->float('numberOil');
            $table->string('licenceNumber');
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
        Schema::dropIfExists('phieu_tiep_nhien_lieus');
    }
}
