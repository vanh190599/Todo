<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->id('product_id');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->string('product_name');
            $table->integer('product_price');
            $table->integer('product_status');
            $table->integer('product_sale_price');
            $table->string('product_image');
            $table->text('product_desc');
            $table->text('product_uu_dai');
            $table->integer('product_so_luong');
            $table->integer('product_so_luong_ban');
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
        Schema::dropIfExists('tbl_product');
    }
}
