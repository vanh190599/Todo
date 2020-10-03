<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_news', function (Blueprint $table) {
            $table->id('news_id');
            $table->integer('news_category_id');
            $table->text('news_title');
            $table->text('news_desc');
            $table->text('news_content');
            $table->integer('news_hot');
            $table->integer('news_status');
            $table->text('news_image');
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
        Schema::dropIfExists('tbl_news');
    }
}
