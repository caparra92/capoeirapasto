<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('detalle');
            $table->string('descripcion');
            $table->integer('valor');
            $table->timestamps();
        });

        Schema::create('users_pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('estado');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
            $table->integer('pago_id')->unsigned();
            $table->foreign('pago_id')->references('id')->on('pagos')->onDelete('cascade');;
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
        Schema::dropIfExists('pagos');
        Schema::dropIfExists('usuarios_pagos');
    }
}
