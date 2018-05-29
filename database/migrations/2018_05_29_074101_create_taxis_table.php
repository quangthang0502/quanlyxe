<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('licenceNumber');
            $table->string('model');
            $table->string('numberOfSeat');
            $table->integer('status');
            $table->string('codeDriver');
            $table->string('codeLocation');
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
        Schema::dropIfExists('taxis');
    }
}
