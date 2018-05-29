<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoTrinhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lo_trinhs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('origin');
            $table->string('destination');
            $table->time('time');
            $table->float('numberOfKm');
            $table->float('mediumTime');
            $table->bigInteger('fee');
            $table->string('codeCustomer');
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
        Schema::dropIfExists('lo_trinhs');
    }
}
