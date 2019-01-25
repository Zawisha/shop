<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatesCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates_categories', function (Blueprint $table) {
            $table->increments('id');
            $table ->integer('template_id')->unsigned()->default(1);
            $table ->foreign('template_id')->references('id')->on('templates');
            $table ->integer('category_id')->unsigned()->default(1);
            $table ->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('templates_categories');
    }
}
