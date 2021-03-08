<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Convenio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenio', function (Blueprint $table) {

            $table->increments('cod_convenio');
            $table->string('nome_convenio');
            $table->string('rua_convenio');
            $table->string('bairro_convenio');
            $table->string('cidade_convenio');
            $table->integer('criado_por')->unsigned();
            $table->integer('activated');

            $table->foreign('criado_por')->references('cod_usuario')->on('usuario');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('convenio');
    }
}
