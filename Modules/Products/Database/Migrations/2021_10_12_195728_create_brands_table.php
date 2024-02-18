<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Products\Entities\Brand;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });


        $brand = new Brand();
        $brand->name = 'TOTAL';
        $brand->save();


        $brand = new Brand();
        $brand->name = 'CROWN';
        $brand->save();


        $brand = new Brand();
        $brand->name = 'MAKITA';
        $brand->save();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
}
