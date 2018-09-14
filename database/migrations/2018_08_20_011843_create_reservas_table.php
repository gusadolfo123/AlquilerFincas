<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('finca_id')->unsigned();
            $table->integer('cliente_id')->unsigned();
            $table->datetime('fec_Reserva');
            $table->datetime('fec_Ingreso');
            $table->datetime('fec_Salida');
            $table->float('preCotizacion', 18,2);
            $table->text('requerimientos');
            $table->integer('cant_huespedes');            

            $table->enum('estado', ['VERIFICACION', 'CONFIRMADO'])->default('VERIFICACION');

            $table->foreign('finca_id')->references('id')->on('fincas');
            $table->foreign('cliente_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
