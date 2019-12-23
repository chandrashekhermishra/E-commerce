<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\ProductItem;
class CreateProductItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_items', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer(ProductItem::USERID)->unsigned();
            $table->foreign(ProductItem::USERID)->references('id')->on('users');

            $table->integer(ProductItem::SUBCATEGORYID)->unsigned();
            $table->foreign(ProductItem::SUBCATEGORYID)->references('id')->on('subcategory');

            $table->integer(ProductItem::CATEGORYID)->unsigned();
            $table->foreign(ProductItem::CATEGORYID)->references('id')->on('product_category');
            
            $table->string(ProductItem::PRODUCTNAME);
            $table->decimal(ProductItem::PRICE, 10, 2);
            $table->string(ProductItem::SKU,10);
            $table->longText(ProductItem::DESCRIPTION);
            $table->string(ProductItem::PRODUCTIMAGES);

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
        Schema::dropIfExists('product_items');
    }
}
