<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Treino;

class Exercicio extends Model
{
  protected $fillable = [
      'name','status',
  ];

  public function treinos(){

    return $this->belongsToMany(Treino::class,'formar_treinos','exercicio_id','treino_id');
  }

  public function avaliacao(){

    return $this->belongsToMany(Avaliacao::class,'formar_avals','exercicio_id','avaliacao_id');
  }
}
