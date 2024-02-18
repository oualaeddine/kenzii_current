<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Stores\Entities\Store_setting;

class CreateStoreSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->text('value');
            $table->string('priorty')->nullable();
            $table->string('group')->nullable();
            $table->bigInteger('store_id')->unsigned()->nullable();
            $table->foreign('store_id')->references('id')->on('stores');
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
        Schema::dropIfExists('store_settings');
    }
}
