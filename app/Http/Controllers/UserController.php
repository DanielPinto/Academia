<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\GeneralService;
use App\Models\Funcionario;
use Auth;

class UserController extends Controller
{


    private $general;
    private $service;


  /**
   * Create a new controller instance.
   *
   * @return void
   */
   public function __construct(GeneralService $general, UserService $service)
   {
      $this->middleware('auth');
      $this->middleware('role', ['except'=>'editSenha']);
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function newUser(Request $request, $id)
    {
      $user = $this->service->newUser($request, $id);

      session_start();

      if($user)
      {
        $_SESSION["message"] = $this->general->messageSuccess('Usuário Criado com sucesso!');

      }else {

        $_SESSION["message"] = $this->general->messageError('Erro ao criar o usuário!');
      }

       return redirect('funcionarios/'.$id);

     }


    public function statusUser(Request $request, $id){

      $user = $this->service->statusUser($id);

      session_start();

      if($user->status == 1)
      {
        $_SESSION["message"] = $this->general->messageSuccess('Usuário Ativado!');

      }elseif ($user->status == 0)
      {
        $_SESSION["message"] = $this->general->messageSuccess('Usuário Desativado!');
      }

      return redirect('funcionarios/'.$request->funcionario);

    }

    public function editSenha(Request $request)
    {
      try {
          session_start();

          $user = User::find(Auth::user()->id);

          $user->password = bcrypt($request->password);

          $user->save();




          $_SESSION["message"] = $this->general->messageSuccess('senha alterada com sucesso!');

          return redirect('funcionarios/profile');

        } catch (\Exception $e)
        {
          $_SESSION["message"] = $this->general->messageError('Erro alterar a senha! ');
          return redirect('funcionarios/profile');
        }


  }

}
