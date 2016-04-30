<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBusinessProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('business_id');
            $table->string('name');
            $table->string('price');
            $table->string('image_url');
            $table->string('product_category_id');
            $table->enum('active', [1, 0])->default(1);
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
        Schema::drop('business_products');
    }
}
