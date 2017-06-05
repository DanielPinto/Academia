<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aluno;

class Pagamento extends Model
{

  protected $fillable = ['data_vencimento','data_pagamento','valor','status','aluno_id'];



  public function aluno()
  {
    return $this->belongsTo(Aluno::class);
  }


}
