<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('categories_id')->unsigned();
            $table->integer('discount_id')->unsigned();
            $table->string('product_name');
            $table->float('weight');
            $table->float('screen');
            $table->string('screen_resolution');
            $table->string('operating_system');
            $table->string('version_operating_system');
            $table->string('cpu');
            $table->string('gpu');
            $table->integer('ram');
            $table->tinyInteger('memory_slot');
            $table->string('camera_fr');
            $table->string('camera_ba');
            $table->string('video');
            $table->string('sim');
            $table->string('pin');
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
        Schema::dropIfExists('product');
    }
}
