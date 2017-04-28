<?php

namespace App\Services;
use App\User;
use App\Models\Funcionario;

class UserService
{



  public function newUser($request, $id)
  {
    $funcionario = Funcionario::find($id);

    $user = new User();

    $user->name = $funcionario->name;
    $user->email = $funcionario->email;
    $user->password = bcrypt($funcionario->cpf);
    $user->auth = $request->auth;
    $user->status = 1;
    $user->funcionario_id = $funcionario->id;

    $status = $user->save();

    return $status;

  }



  public function statusUser($id)
  {

    try
    {
      $user = User::find($id);

      $user->status == 0 ? $user->status = 1 : $user->status = 0 ;

      $status = $user->save();

      return $user;

    }catch (Exception $e) {

      return $e;
    }

  }

}
