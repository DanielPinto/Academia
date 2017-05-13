<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlunoTreino extends Model
{
  protected $fillable = [
      'treino_id','aluno_id','dia_semana',
  ];
}
