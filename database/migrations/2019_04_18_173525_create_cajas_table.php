<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCajasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cajas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('saldo_actual');
            $table->integer('saldo_anterior');
            $table->string('estado');
            $table->timestamps();
        });

        Schema::create('mov_cajas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('base');
            $table->date('fecha_apertura');
            $table->date('fecha_cierre');
            $table->integer('diferencia');
            $table->string('observaciones');
            $table->integer('caja_id')->unsigned();
            $table->foreign('caja_id')->references('id')->on('cajas')->onDelete('cascade');;
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
            $table->timestamps();
        });

        Schema::create('ingresos_caja', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('concepto');
            $table->integer('pago_id')->unsigned();
            $table->foreign('pago_id')->references('id')->on('pagos')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('mov_caja_id')->unsigned();
            $table->foreign('mov_caja_id')->references('id')->on('mov_cajas')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('egresos_caja', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('concepto');
            $table->integer('valor');
            $table->integer('pago_id')->unsigned();
            $table->foreign('pago_id')->references('id')->on('pagos')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('mov_caja_id')->unsigned();
            $table->foreign('mov_caja_id')->references('id')->on('mov_cajas')->onDelete('cascade');
            $table->integer('valor_total');
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
        Schema::dropIfExists('cajas');
        Schema::dropIfExists('ingresos_caja');
        Schema::dropIfExists('egresos_caja');
    }
}
