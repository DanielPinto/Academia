<?php

namespace App\Services;
use App\Models\Funcionario;

class FuncionarioService
{

  public function editFoto($file, $id)
  {

      try {


        $funcionario = Funcionario::find($id);

        $extension=$file->getClientOriginalExtension();


        if(!( $extension=="jpg" || $extension=="JPG" || $extension=="jpeg" || $extension=="png" || $extension=="gyf")){
          return false;
        }


        $path = ('images'.DIRECTORY_SEPARATOR.'profiles'.DIRECTORY_SEPARATOR.$id);

        $fotoName = time().'.'.$extension;

        //teste se existe o diretório
        if ($funcionario->foto != 'user.png')
          if (!unlink($path.DIRECTORY_SEPARATOR.$funcionario->foto))//se não conseguir apagar o arquivo retorna false
            return false;


        $file->move($path, $fotoName); //cria o novo arquivo no diretório


        $funcionario->foto = $fotoName; //

        $funcionario->save();

        return true;

      } catch (Exception $e) {

          return false;

      }

  }


}
