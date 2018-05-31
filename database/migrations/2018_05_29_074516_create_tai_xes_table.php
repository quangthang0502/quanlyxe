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
            $table->string('cardNumber');
            $table->date('birthday');
            $table->string('danToc');
            $table->string('relationship');
			$table->string('religion');
			$table->string('educationalLevel');
			$table->string('email');
			$table->integer('gender');
			$table->string('story');
			$table->string('description');
			$table->boolean('active');
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
