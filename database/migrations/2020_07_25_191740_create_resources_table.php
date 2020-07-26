<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->comment('Произвольное имя либо описание ресурса.');
            $table->string('resource');
            $table->foreignId('source_id')->references('id')->on('sources')->comment('Ссылка на источник новости. Источник новости определяет алгоритм загрузки.');
            $table->foreignId('category_id')->references('id')->on('categories')->comment('Категория по умолчанию.');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resources');
    }
}
