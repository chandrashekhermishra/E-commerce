<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_product_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ProductItem_id')->unsigned();
            $table->foreign('ProductItem_id')->references('id')->on('product_items');
            $table->string('angle1');
            $table->string('angle2');
            $table->string('angle3');
            $table->string('angle4');
            $table->string('angle5');
            $table->string('angle6');

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
        Schema::dropIfExists('_product_images');
    }
}
