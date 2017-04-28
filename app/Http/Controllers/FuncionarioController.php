<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Services\GeneralService;
use App\Services\FuncionarioService;
use App\User;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redirect;
use Auth;


class FuncionarioController extends Controller
{


  private $general;
  private $service;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
   public function __construct(GeneralService $general, FuncionarioService $service)
   {

      $this->middleware('auth');
      $this->middleware('role', ['except'=>['profile','profileEdit','profileUpdate','profileEditFoto']]);
      $this->general = $general;
      $this->service = $service;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      session_start();

      $data = Funcionario::all();

      if (isset($_SESSION["message"])) {

        $data->message = $_SESSION["message"];
        unset($_SESSION["message"]);
      }

      return view('funcionarios.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

          return view('funcionarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      session_start();

      try {

/*
        $this->validate($request,[
          'name' => 'required',

        ]);

*/
          $funcionario =[
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'rg' => $request->rg,
            'telefone_1' => $request->fone_1,
            'telefone_2' => $request->fone_2,
            'cep'=>$request->cep,
            'endereco' => $request->endereco,
            'numero'=>$request->numero,
            'complemento'=>$request->complemento,
            'cidade'=>$request->cidade,
            'bairro'=>$request->bairro,
            'uf'=>$request->uf,
            'sexo' => $request->sexo,
            'idade' => $request->idade,
            'data_admissao' => $request->data_admissao,
            'salario' => $request->salario,
            'funcao' => $request->funcao,
            'foto' => 'user.png',
            'status'=>1,
          ];



          $data = Funcionario::create($funcionario);

          $_SESSION["message"] = $this->general->messageSuccess('Funcionário Cadastrado com sucesso!');

          return redirect('funcionarios/'.$data->id);

        }catch (QueryException $e) {

          $_SESSION["message"] = $this->general->messageSuccess('Erro ao inserir os dados! ');

          return redirect('funcionarios/create');

      }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        session_start();

        $data = Funcionario::with('user')->find($id);

        if($data == null){


          $_SESSION["message"] = $this->general->messageError('Funcionário não Existente!');

          return redirect('funcionarios');
        }

        if (isset($_SESSION["message"])) {
          $data->message = $_SESSION["message"];
          unset($_SESSION["message"]);
        }

        return view('funcionarios.show')->with('data', $data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $funcionario = Funcionario::find($id);

      if(!$funcionario)
        abort(404);

      $date = date_create($funcionario->data_admissao);
      $funcionario->data_admissao = date_format($date,'yy-m-d');




      return view('funcionarios.edit')->with('data', $funcionario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      try {
          session_start();

          $funcionario = Funcionario::find($id);

          $funcionario->name = $request->name;
          $funcionario->email = $request->email;
          $funcionario->cpf = $request->cpf;
          $funcionario->rg = $request->rg;
          $funcionario->telefone_1 = $request->fone_1;
          $funcionario->telefone_2 = $request->fone_2;
          $funcionario->cep = $request->cep;
          $funcionario->endereco = $request->endereco;
          $funcionario->numero = $request->numero;
          $funcionario->complemento = $request->complemento;
          $funcionario->bairro = $request->bairro;
          $funcionario->cidade = $request->cidade;
          $funcionario->uf = $request->uf;
          $funcionario->sexo = $request->sexo;
          $funcionario->idade = $request->idade;
          $funcionario->data_admissao = $request->data_admissao;
          $funcionario->salario = $request->salario;
          $funcionario->funcao = $request->funcao;


          $funcionario->save();




          $_SESSION["message"] = $this->general->messageSuccess('Dados inseridos com sucesso!');

          return redirect('funcionarios/'.$id);

        } catch (\Exception $e)
        {
          $_SESSION["message"] = $this->general->messageSuccess('Erro ao inserir os dados! ');
          return redirect('funcionarios/'.$id);

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      try {
          session_start();

          $funcionario = Funcionario::find($id);
          $message = '';

          if ($funcionario->status == 1) {
            $funcionario->status = 0;
            $message = "Funcionário Desativado!";

          }else{
            $funcionario->status = 1;
            $message = "Funcionário Ativado!";
          }

          $funcionario->save();



          $_SESSION["message"] = $this->general->messageSuccess($message);
          return redirect('funcionarios/'.$id);

        } catch (\Exception $e)
        {
          $_SESSION["message"] = $this->general->messageSuccess('Erro ao inserir os dados! ');
          return redirect('funcionarios/'.$id);

        }

    }




    public function editFoto(Request $request, $id)
    {

      try {

          $file=$request->file('foto');

          session_start();

          if($this->service->editFoto($file,$id)){

            $_SESSION["message"] = $this->general->messageSuccess('Foto inserida!');

          }else {

            $_SESSION["message"] = $this->general->messageError('Erro ao inserir a foto!');

          }



        return redirect('funcionarios/'.$id);


      } catch (Exception $e) {
        return $e->getMessage();
      }

    }

    public function profile(){

      session_start();

      $data = Funcionario::with('user')->find(Auth::user()->funcionario_id);

      if($data == null){


        $_SESSION["message"] = $this->general->messageError('Funcionário não Existente!');

        return redirect('funcionarios');
      }

      if (isset($_SESSION["message"])) {
        $data->message = $_SESSION["message"];
        unset($_SESSION["message"]);
      }

      return view('funcionarios.profile')->with('data', $data);

    }

    public function profileEdit(){
      $data = Funcionario::find(Auth::user()->funcionario_id);

      if(!$data)
        abort(404);

      $date = date_create($data->data_admissao);
      $data->data_admissao = date_format($date,'yy-m-d');

      return view('funcionarios.profileEdit')->with('data', $data);

    }


    public function profileUpdate(Request $request)
    {
      try {
          session_start();

          $funcionario = Funcionario::find(Auth::user()->funcionario_id);

          $funcionario->name = $request->name;
          $funcionario->email = $request->email;
          $funcionario->cpf = $request->cpf;
          $funcionario->rg = $request->rg;
          $funcionario->telefone_1 = $request->fone_1;
          $funcionario->telefone_2 = $request->fone_2;
          $funcionario->cep = $request->cep;
          $funcionario->endereco = $request->endereco;
          $funcionario->numero = $request->numero;
          $funcionario->complemento = $request->complemento;
          $funcionario->bairro = $request->bairro;
          $funcionario->cidade = $request->cidade;
          $funcionario->uf = $request->uf;
          $funcionario->sexo = $request->sexo;
          $funcionario->idade = $request->idade;

          $funcionario->save();




          $_SESSION["message"] = $this->general->messageSuccess('Dados inseridos com sucesso!');

          return redirect('funcionarios/profile');

        } catch (\Exception $e)
        {
          $_SESSION["message"] = $this->general->messageSuccess('Erro ao inserir os dados! ');
          return redirect('funcionarios/profile');

        }

    }



    public function profileEditFoto(Request $request)
    {

      try {

          $file=$request->file('foto');
          $id = Auth::user()->funcionario_id;
          session_start();

          if($this->service->editFoto($file,$id)){

            $_SESSION["message"] = $this->general->messageSuccess('Foto inserida!');

          }else {

            $_SESSION["message"] = $this->general->messageError('Erro ao inserir a foto!');

          }



        return redirect('funcionarios/profile');


      } catch (Exception $e) {
        return $e->getMessage();
      }

    }


}
