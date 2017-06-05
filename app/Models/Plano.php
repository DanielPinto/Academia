<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aluno;

class Plano extends Model
{
  protected $fillable = [
      'name','dias','valor','status',
  ];


  public function alunos()
  {
      return $this->hasMany(Aluno::class);
  }
}
