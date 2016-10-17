<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourTourCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_tour_category', function (Blueprint $table) {
            $table->unsignedInteger('tour_id');
            $table->unsignedInteger('tour_category_id');

            $table->foreign('tour_id')->references('id')->on('tours')->onDelete('cascade');
            $table->foreign('tour_category_id')->references('id')->on('tour_categories')->onDelete('cascade');

            $table->primary(['tour_id', 'tour_category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tour_tour_category');
    }
}
