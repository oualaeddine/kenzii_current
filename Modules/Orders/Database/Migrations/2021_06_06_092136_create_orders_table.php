<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('yal_tracking')->nullable();
            $table->string('name');
            $table->string('phone');
            $table->string('address')->nullable();
            $table->string('wilaya')->nullable();
            $table->unsignedBigInteger('id_mairie')->nullable();
            $table->float('discount')->default(0);
            $table->float('delivery_price')->default(0);
            $table->longText('comments')->nullable();

            $table->string('last_status')->default("new");
            $table->softDeletes();
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
        Schema::dropIfExists('orders');
    }
}
