<?php

namespace App\Services;


use Auth;

class GeneralService
{


  public function messageError( $body){

    $message = array(
      'text' => $body ,
      'title' => 'Erro!',
      'type' => 'error',
     );

     return $message;
  }


  public function messageSuccess($body){

    $message = array(
      'text' => $body ,
      'title' => 'Sucesso!',
      'type' => 'success',
     );

     return $message;
  }



  public function messageInfo($body){

    $message = array(
      'text' => $body ,
      'title' => 'Informação!',
      'type' => 'info',
     );

     return $message;
  }


  public function messageWarning($body){

    $message = array(
      'text' => $body ,
      'title' => 'Atenção!',
      'type' => '',
     );

     return $message;
  }


public function nivelAuth(){

  return Auth::user()->auth;
}

public function dateInverse($date)
{
  $date_aux = explode('-',$date);

  $date_inverse[0] = $date_aux[2];
  $date_inverse[1] = $date_aux[1];
  $date_inverse[2] = $date_aux[0];

  $date_inverse = implode('-', $date_inverse);

  return $date_inverse;

}


}
