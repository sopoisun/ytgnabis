<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('permalink')->unique();
            $table->string('relation_id');
            $table->string('seo_id');
            $table->string('controller');
            $table->string('function');
            $table->string('site_title')->nullable();
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();
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
        Schema::drop('seos');
    }
}
