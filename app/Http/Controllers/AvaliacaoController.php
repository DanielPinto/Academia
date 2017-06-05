<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use App\Models\Aluno;
use App\Models\Exercicio;
use App\Services\GeneralService;
use Illuminate\Http\Request;


class AvaliacaoController extends Controller
{

  private $general;
  private $url;
  private $model;
  private $aluno;
  private $tipoExe;

  public function __construct(
    GeneralService $general,
    Avaliacao $model,
    Aluno $aluno,
    Exercicio $tipoExe
  )
  {

     $this->middleware('auth');
     $this->middleware('role');
     $this->general = $general;
     $this->url = 'avaliacoes';
     $this->model = $model;
     $this->aluno = $aluno;
     $this->tipoExe = $tipoExe;

   }



       /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */
       public function index()
       {
         session_start();

         $data = $this->model->with('aluno')->get();

         if (isset($_SESSION["message"])) {

           $data->message = $_SESSION["message"];
           unset($_SESSION["message"]);
         }

         return view($this->url.'.index')->with('data', $data);
       }






   public function show($id)
   {
     session_start();


     $data = $this->model->with('aluno')->with('exercicios')->find($id);
     $tipoExe = $this->tipoExe->all();

     if($data == null){

       $_SESSION["message"] = $this->general->messageError('Avaliação não Existente!');

       return redirect($this->url);
     }

     if (isset($_SESSION["message"])) {
       $data->message = $_SESSION["message"];
       unset($_SESSION["message"]);
     }


     return view($this->url.'.show')->with('data', $data)->with('tipoExe', $tipoExe);
   }
















    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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

        $av =[
          'data_avaliacao' => $request->data_avaliacao,
          'nota' => null,
          'aluno_id' => $request->aluno_id
        ];

        $data = $this->model->create($av);


        $_SESSION["message"] = $this->general->messageSuccess('Avaliação criada com sucesso!');

        return redirect($this->url.'/'.$data->id);

      }catch (QueryException $e) {

        $_SESSION["message"] = $this->general->messageSuccess('Erro ao inserir os dados! ');

        return redirect($this->url.'/create');

      }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Avaliacao $avaliacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Avaliacao $avaliacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Avaliacao $avaliacao)
    {
        //
    }
}
