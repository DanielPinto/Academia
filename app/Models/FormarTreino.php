<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Treino;
use App\Models\Exercicio;

class FormarTreino extends Model
{
  protected $fillable = [
      'treino_id','exercicio_id','aparelho','peso','serie','quantidade_serie','tempo',
  ];

}
