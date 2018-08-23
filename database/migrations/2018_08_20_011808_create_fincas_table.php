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
            $table->integer('max_personas');            
            $table->boolean('sn_jacuzi');
            $table->boolean('sn_piscina');
            $table->string('slug', 128)->unique(); // url amigable
            
            $table->integer('via_id')->unsigned();
            $table->integer('ciudad_id')->unsigned();

            //relaciones
            $table->foreign('via_id')->references('id')->on('vias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ciudad_id')->references('id')->on('ciudads')->onDelete('cascade')->onUpdate('cascade');

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
