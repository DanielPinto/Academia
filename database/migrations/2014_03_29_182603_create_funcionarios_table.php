<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
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
            $table->integer('idade');
            $table->date('data_admissao');
            $table->float('salario');
            $table->string('funcao');
            $table->string('foto');
            $table->integer('status');
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
        Schema::dropIfExists('funcionarios');
    }
}
