<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('fullname');
            $table->integer('gender');
            $table->char('phone',10);
            $table->string('address');
            $table->integer('point')->nullable();
            $table->integer('status');
            $table->integer('role')->unsigned();
            $table->string('remember_token')->nullable();
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
        Schema::dropIfExists('user');
    }
}
