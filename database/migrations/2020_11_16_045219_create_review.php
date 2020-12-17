<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('user_id')->nullable()->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('product_detail_id')->unsigned();
            $table->string('email');
            $table->string('name');
            $table->char('phone',10);
            $table->integer('point');
            $table->text('content');
            $table->integer('status');
            $table->softDeletes();
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
        Schema::dropIfExists('review');
    }
}
