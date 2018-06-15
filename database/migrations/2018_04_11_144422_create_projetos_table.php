<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projetos', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            $table->string('titulo')->unique();
            $table->year('ano_publicacao');

            $table->integer('area_pesquisa_id')->unsigned();
            $table->foreign('area_pesquisa_id')->references('id')->on('area_pesquisas');

            $table->integer('orientador_id')->unsigned();
            $table->foreign('orientador_id')->references('id')->on('orientadores');
            
            $table->integer('aluno_id')->unsigned();
            $table->foreign('aluno_id')->references('id')->on('alunos');
            
            $table->integer('arquivo_id')->unsigned();
            $table->foreign('arquivo_id')->references('id')->on('arquivos');

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
        Schema::dropIfExists('projetos');
    }
}
