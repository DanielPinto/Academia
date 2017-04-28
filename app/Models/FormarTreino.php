<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormarTreino extends Model
{
  protected $fillable = [
      'id_treino','id_exercicio','aparelho','peso','serie','quantidade_serie','tempo',
  ];
}
