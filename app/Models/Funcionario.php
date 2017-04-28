<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Funcionario extends Model
{

  protected $fillable = [
      'name', 'email', 'cpf','rg','telefone_1','telefone_2',
      'endereco','sexo','idade','data_admissao','salario',
      'funcao','foto','cep', 'numero', 'complemento','cidade',
      'bairro', 'uf', 'status'

  ];



  public function user(){
    return $this->hasOne(User::class);
  }
}
