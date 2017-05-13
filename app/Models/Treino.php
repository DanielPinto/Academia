<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aluno;
use App\Models\Exercicio;

class Treino extends Model
{
  protected $fillable = [
      'name','status',
  ];

  public function exercicios(){

    return $this->belongsToMany(Exercicio::class,'formar_treinos','treino_id','exercicio_id')->withPivot('id','aparelho','peso','serie','quantidade_serie','tempo');
  }

  public function alunos(){

    return $this->belongsToMany(Aluno::class,'aluno_treinos','treino_id','aluno_id')->withPivot('id','name','status');
  }

}
