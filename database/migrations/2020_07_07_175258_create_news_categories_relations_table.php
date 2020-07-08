<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsCategoriesRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_categories_relations', function (Blueprint $table) {
            $table->foreignId('news_id')->references('id')->on('news');
            $table->foreignId('category_id')->references('id')->on('categories');
            $table->primary(['news_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news_categories_relations', function (Blueprint $table) {
            //
        });
    }
}
