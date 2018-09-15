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
            $table->string('archivo', 128);
            $table->string('name', 128)->nullable();
            $table->string('description', 128)->nullable();
            $table->string('file_name', 128)->nullable();
            
            $table->integer('finca_id')->unsigned();
            $table->foreign('finca_id')->references('id')->on('fincas');

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
