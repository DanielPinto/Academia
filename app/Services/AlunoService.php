<?php

namespace App\Services;
use App\Models\Aluno;

class AlunoService
{

  public function calculaIMC($altura,$peso)
  {

    return ($peso/($altura*$altura));

  }

  public function statusIMC($imc,$sexo,$idade)
  {

    $statusIMC = 0;

    if($imc < 18.5)
    {
      return "Abaixo do Peso";

    }elseif ($imc >= 18.5 && $imc < 25) {
      return "Peso Adequado";
    }elseif ($imc >= 25 && $imc < 30) {
      return "Sobrepeso";
    }elseif ($imc >= 30) {
      return "Obesidade";
    }


    return ($peso/($altura*$altura));

  }



  public function calc_idade($data_nasc)
  {

  $data_nasc=explode('-',$data_nasc);

  $data=date('Y-m-d');

  $data=explode('-',$data);

  $anos=$data[0]-$data_nasc[0];

  if($data_nasc[1] > $data[1])
    return $anos-1;

  if($data_nasc[1] == $data[1])

    if($data_nasc[2] <= $data[2]) {
      return $anos;

  }else{
    return $anos-1;

      }

  if ($data_nasc[1] < $data[1])
    return $anos;
  }





  public function editFoto($file, $id)
  {

      try {


        $aluno = Aluno::find($id);

        $extension=$file->getClientOriginalExtension();


        if(!( $extension=="jpg" || $extension=="JPG" || $extension=="jpeg" || $extension=="png" || $extension=="gyf")){
          return false;
        }


        $path = ('images'.DIRECTORY_SEPARATOR.'profiles'.DIRECTORY_SEPARATOR.$id);

        $fotoName = time().'.'.$extension;

        //teste se existe o diretório
        if ($aluno->foto != 'user.png')
          if (!unlink($path.DIRECTORY_SEPARATOR.$aluno->foto))//se não conseguir apagar o arquivo retorna false
            return false;


        $file->move($path, $fotoName); //cria o novo arquivo no diretório


        $aluno->foto = $fotoName; //

        $aluno->save();

        return true;

      } catch (Exception $e) {

          return false;

      }

    }

}
