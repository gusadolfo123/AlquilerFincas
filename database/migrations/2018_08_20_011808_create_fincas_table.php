<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFincasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fincas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 128);
            $table->text('descripcion');
            $table->decimal('precio_Tbaja');
            $table->decimal('precio_Talta');
            $table->string('direccion', 128);
            $table->integer('cant_habitaciones');
            $table->integer('cant_banios');
            $table->boolean('sn_jacuzi');
            $table->boolean('sn_piscina');
            $table->string('slug', 128)->unique(); // url amigable
            
            $table->integer('id_via')->unsigned();
            $table->integer('id_ciudad')->unsigned();

            //relaciones
            $table->foreign('id_via')->references('id')->on('vias');
            $table->foreign('id_ciudad')->references('id')->on('ciudads');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fincas');
    }
}
