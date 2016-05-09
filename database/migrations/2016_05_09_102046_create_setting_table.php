<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone');
            $table->string('email');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('g_plus');
            $table->string('youtube');
            $table->string('instagram');
            $table->text('alamat');
            $table->string('map_latitude');
            $table->string('map_longitude');
            $table->text('about_us');
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
        Schema::drop('settings');
    }
}
