<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Telefone extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefone', function (Blueprint $table) {

            $table->increments('cod_telefone');
            $table->string('numero_telefone');
            $table->integer('convenio_telefone')->unsigned();

            $table->foreign('convenio_telefone')->references('cod_convenio')->on('convenio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('telefone');
    }
}
