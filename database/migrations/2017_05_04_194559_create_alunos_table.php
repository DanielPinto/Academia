<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('cpf');
            $table->string('rg');
            $table->string('telefone_1');
            $table->string('telefone_2');
            $table->string('endereco');
            $table->string('cep');
            $table->string('numero');
            $table->string('complemento');
            $table->string('cidade');
            $table->string('bairro');
            $table->string('uf');
            $table->string('sexo');
            $table->date('data_nascimento');
            $table->string('profissao');
            $table->integer('dia_pagamento');
            $table->integer('status_pagamento');
            $table->float('peso');
            $table->float('altura');
            $table->string('foto');
            $table->float('imc');
            $table->integer('status');
            $table->string('atividade_diaria');
            $table->string('historico_atividade');
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->integer('plano_id')->unsigned();
            $table->foreign('plano_id')->references('id')->on('planos')->onDelete('cascade');
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
        Schema::dropIfExists('alunos');
    }
}
