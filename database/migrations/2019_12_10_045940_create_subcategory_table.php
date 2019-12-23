<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\SubCategory;
class CreateSubcategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategory', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->integer(SubCategory::CATEGORYID)->unsigned();
            $table->foreign(SubCategory::CATEGORYID)->references('id')->on('product_category');
            $table->string(SubCategory::SUBCATEGORY);

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
        Schema::dropIfExists('subcategory');
    }
}
