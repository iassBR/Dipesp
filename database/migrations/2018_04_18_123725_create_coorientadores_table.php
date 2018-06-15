<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoorientadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coorientadores', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            
            $table->integer('orientador_id')->unsigned();
            $table->foreign('orientador_id')->references('id')->on('orientadores');
            
            $table->integer('projeto_id')->unsigned();
            $table->foreign('projeto_id')->references('id')->on('projetos');
            
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
        Schema::dropIfExists('coorientadores');
    }
}
