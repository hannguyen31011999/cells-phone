<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlug extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slug', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('product');
            $table->integer('product_detail_id')->nullable()->unsigned();
            $table->foreign('product_detail_id')->references('id')->on('product_detail');
            $table->string('url');
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
        Schema::dropIfExists('slug');
    }
}
