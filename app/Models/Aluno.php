<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Treino;
use App\Models\Pagamento;
use App\Models\Plano;

class Aluno extends Model
{
    protected $fillable = [
      'name',
      'email',
      'cpf',
      'rg',
      'telefone_1',
      'telefone_2',
      'cep',
      'endereco',
      'numero',
      'complemento',
      'cidade',
      'bairro',
      'uf',
      'sexo',
      'data_nascimento',
      'profissao',
      'dia_pagamento',
      'status_pagamento',
      'peso',
      'altura',
      'imc',
      'foto',
      'status',
      'data_cadastro',
      'proximo_pagamento',
      'atividade_diaria',
      'historico_atividade',
      'categoria_id',
      'plano_id',
    ];



    public function treinos(){

      return $this->belongsToMany(Treino::class,'aluno_treinos','aluno_id','treino_id')->withPivot('id','treino_id','aluno_id','dia_semana')->with('exercicios');
    }

    public function pagamentos()
    {
        return $this->hasMany(Pagamento::class);
    }

    public function plano()
    {
      return $this->belongsTo(Plano::class);
    }

    public function avaliacoes()
    {
      return $this->hasMany(Avaliacao::class);
    }
}
