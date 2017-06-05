<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    protected $fillable=[
      'data_avaliacao',
      'nota',
      'aluno_id'
    ];


    public function aluno()
    {
      return $this->belongsTo(Aluno::class);
    }

    public function exercicios(){

      return $this->belongsToMany(Exercicio::class,'formar_avals','avaliacao_id','exercicio_id')->withPivot('id','aparelho','peso','serie','quantidade_serie','tempo');
    }

}
