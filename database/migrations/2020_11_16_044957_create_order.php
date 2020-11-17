<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('customer_id')->nullable()->unsigned();
            $table->tinyInteger('payment');
            $table->text('note')->nullable();
            $table->string('email');
            $table->string('name');
            $table->char('phone',10);
            $table->string('address');
            $table->tinyInteger('status');
            $table->float('total_price');
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
        Schema::dropIfExists('order');
    }
}
