<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaissesEuroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /*  description, montant, date, type(injection, retrait, paiement_yal) */
        Schema::create('caisse_euros', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->double('montant',2)->nullable();
            $table->date('date')->nullable();
            $table->enum('type',['injection','retrait','charges']);
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('person_id')->unsigned()->nullable();
            $table->foreign('person_id')->references('id')->on('users');
            $table->double('change_euro',2)->nullable();
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
