<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferenceFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('district', function ($table) {
            $table->foreign('province_id')->references('id')->on('province')->onDelete('cascade');
        });

        Schema::table('ward', function ($table) {
            $table->foreign('district_id')->references('id')->on('district')->onDelete('cascade');
        });

        Schema::table('product', function ($table) {
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('discount_id')->references('id')->on('discount')->onDelete('cascade');
        });

        Schema::table('product_detail', function ($table) {
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
        });

        Schema::table('post', function ($table) {
            $table->foreign('user_id_created')->references('id')->on('user')->onDelete('cascade');
        });

        Schema::table('user', function ($table) {
            $table->foreign('role')->references('id')->on('permisson')->onDelete('cascade');
        });

        Schema::table('order', function ($table) {
            $table->foreign('customer_id')->references('id')->on('user')->onDelete('cascade');
        });

        Schema::table('order_detail', function ($table) {
            $table->foreign('order_id')->references('id')->on('order')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
            $table->foreign('attribute_product_id')->references('id')->on('attribute_product')->onDelete('cascade');
        });

        Schema::table('review', function ($table) {
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
            $table->foreign('product_detail_id')->references('id')->on('product_detail')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reference_fk');
    }
}
