<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_customizable_option_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('price', 12, 4)->default(0);
            $table->integer('product_customizable_option_id')->unsigned();
            $table->integer('qty')->default(0);
            $table->boolean('is_user_defined')->default(1);
            $table->boolean('is_default')->default(0);
            $table->integer('sort_order')->default(0);

            $table->foreign('product_customizable_option_id', 'pcop_product_customizable_option_id_foreign')
                ->references('id')
                ->on('product_customizable_options')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_customizable_option_prices');
    }
};
