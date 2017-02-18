<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTempFieldProductBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_products', function (Blueprint $table) {
            $table->enum('original_image', [0, 1])->default(0);
            $table->string('satuan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business_products', function (Blueprint $table) {
            $table->dropColumn('original_image');
            $table->dropColumn('satuan');
        });
    }
}
