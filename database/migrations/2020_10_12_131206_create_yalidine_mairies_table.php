<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYalidineMairiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yalidine_mairies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_wilaya');
            $table->string('name');
            $table->timestamps();

            $table->foreign('id_wilaya')->references('id')->on('yalidine_wilayas');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yalidine_mairies');
    }
}
