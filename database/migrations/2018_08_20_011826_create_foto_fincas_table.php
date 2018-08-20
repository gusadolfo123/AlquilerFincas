<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFotoFincasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_fincas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('archivo', 128)->nullable();
            
            $table->integer('id_finca')->unsigned();
            $table->foreign('id_finca')->references('id')->on('fincas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foto_fincas');
    }
}
