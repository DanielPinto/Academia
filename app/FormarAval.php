<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormarAval extends Model
{
  protected $fillable = [
      'avaliacao_id','exercicio_id','aparelho','peso','serie','quantidade_serie','tempo',
  ];
}
