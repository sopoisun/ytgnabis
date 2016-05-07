<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('seo_id');
            $table->string('post_title');
            $table->string('user_id');
            $table->string('post_category_id');
            $table->text('isi');
            $table->enum('publish', [1, 0])->default(1);
            $table->enum('active', [1, 0])->default(1);
            $table->integer('counter')->default(0);
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
        Schema::drop('posts');
    }
}
