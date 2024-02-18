<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaissesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /*  description, montant, date, type(injection, retrait, paiement_yal) */
        Schema::create('caisses', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->double('montant',2)->nullable();
            $table->date('date')->nullable();
            $table->enum('type',['injection','retrait','paiement_yal']);
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caisses');
    }
}
