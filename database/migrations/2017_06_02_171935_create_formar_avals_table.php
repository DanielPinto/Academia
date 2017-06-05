<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormarAvalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formar_avals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('aparelho');
            $table->float('peso');
            $table->integer('serie');
            $table->integer('quantidade_serie');
            $table->string('tempo');
            $table->integer('avaliacao_id')->unsigned();
            $table->foreign('avaliacao_id')->references('id')->on('avaliacaos');
            $table->integer('exercicio_id')->unsigned();
            $table->foreign('exercicio_id')->references('id')->on('exercicios');
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
        Schema::dropIfExists('formar_avals');
    }
}
