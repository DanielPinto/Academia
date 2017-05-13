<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\AlunoTreino;
use App\Services\GeneralService;
use Illuminate\Http\Request;

class AlunoTreinoController extends Controller
{



  private $model;
  private $general;
  private $url;

  public function __construct(GeneralService $general ,  AlunoTreino $model )
  {

     $this->middleware('auth');
     $this->middleware('role');
     $this->model = $model;
     $this->general = $general;
     $this->url = 'alunos';

   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
      session_start();

      try {
/*  $this->validate($request,[
          'name' => 'required',

        ]);*/

          $treinos = $this->model->where('aluno_id', $request->aluno_id)->get();


          foreach ($treinos as $t) {

            if($t->dia_semana == $request->dia_semana){

              $_SESSION["message"] = $this->general->messageError('Já existe um treino neste dia!');

              return redirect($this->url.'/'.$request->aluno_id);
            }

          }


          $at =[
            'aluno_id' => $request->aluno_id,
            'treino_id' => $request->treino_id,
            'dia_semana' => $request->dia_semana,
          ];





          $data = $this->model->create($at);

          $_SESSION["message"] = $this->general->messageSuccess('Treino Cadastrado com sucesso!');

          return redirect($this->url.'/'.$request->aluno_id);

        }catch (QueryException $e) {

          $_SESSION["message"] = $this->general->messageSuccess('Erro ao inserir os dados! ');

          return redirect($this->url.'/'.$request->aluno_id);

      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AlunoTreino  $alunoTreino
     * @return \Illuminate\Http\Response
     */
    public function show(AlunoTreino $alunoTreino)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AlunoTreino  $alunoTreino
     * @return \Illuminate\Http\Response
     */
    public function edit(AlunoTreino $alunoTreino)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AlunoTreino  $alunoTreino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AlunoTreino $alunoTreino)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlunoTreino  $alunoTreino
     * @return \Illuminate\Http\Response
     */
    public function destroy(AlunoTreino $alunoTreino)
    {
        //
    }
}
