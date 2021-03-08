<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Procedimento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedimento', function (Blueprint $table) {

            $table->increments('cod_procedimento');
            $table->string('nome_procedimento');
            $table->string('cabecalho_procedimento');
            $table->json('corpo_procedimento');
            $table->date('data_criacao_procedimento');
            $table->integer('pertence')->unsigned();
            $table->integer('gerado_por')->unsigned();

            $table->foreign('pertence')->references('cod_convenio')->on('convenio');
            $table->foreign('gerado_por')->references('cod_usuario')->on('usuario');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('procedimento');
    }
}
