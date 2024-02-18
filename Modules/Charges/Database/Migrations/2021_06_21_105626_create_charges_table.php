<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charges', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->bigInteger('add_by')->unsigned()->nullable();
            $table->foreign('add_by')->references('id')->on('users');
            $table->text('description')->nullable();
            $table->string('produit')->nullable();
            $table->double('montant')->nullable();
            $table->enum('type',['facebook_ad','instagram_ad','snapchat_ad','transport','support','emballage','autre'])->nullable();
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
        Schema::dropIfExists('charges');
    }
}
