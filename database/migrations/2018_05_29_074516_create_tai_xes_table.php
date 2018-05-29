<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaiXesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tai_xes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codeDriver');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('address');
            $table->string('phoneNumber');
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
        Schema::dropIfExists('tai_xes');
    }
}
