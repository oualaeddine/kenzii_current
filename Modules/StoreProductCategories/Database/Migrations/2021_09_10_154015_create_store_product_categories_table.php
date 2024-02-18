<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_product_categories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('store_category_id')->unsigned()->nullable();
            $table->foreign('store_category_id')->references('id')->on('store_categories')->onDelete('cascade');
            $table->bigInteger('store_product_id')->unsigned()->nullable();
            $table->foreign('store_product_id')->references('id')->on('store_products')->onDelete('cascade');
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
        Schema::dropIfExists('store_product_categories');
    }
}
