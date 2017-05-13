<?php

namespace App\Http\Controllers;


use App\Models\Treino;
use App\Models\Exercicio;
use App\Models\FormarTreino;
use App\Services\GeneralService;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Database\QueryException;

class FormarTreinoController extends Controller
{

      private $model;
      private $modelExercicio;
      private $formarTreino;
      private $general;
      private $url;

      public function __construct(GeneralService $general ,  Treino $model, Exercicio $modelExercicio, FormarTreino $formarTreino)
      {

         $this->middleware('auth');
         $this->model = $model;
         $this->modelExercicio = $modelExercicio;
         $this->formarTreino = $formarTreino;
         $this->general = $general;
         $this->url = 'formarTreinos';

       }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      session_start();


      $data = $this->model->with('exercicios')->get();

      $tipoExe = $this->modelExercicio->all();


      if (isset($_SESSION["message"])) {

        $data->message = $_SESSION["message"];
        unset($_SESSION["message"]);
      }

      //dd($data);
      //return $tipoExe;
      return view($this->url.'.index')
      ->with('data', $data)
      ->with('tipoExe', $tipoExe);
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

/*
        $this->validate($request,[
          'name' => 'required',

        ]);

*/



          $insert =[

            'treino_id' => $request->treino_id,
            'exercicio_id' => $request->exercicio_id,
            'aparelho' => $request->aparelho,
            'peso' => $request->peso,
            'serie' => $request->serie,
            'quantidade_serie' => $request->quantidade_serie,
            'tempo' => $request->tempo,
          ];



          $data = $this->formarTreino->create($insert);

          $_SESSION["message"] = $this->general->messageSuccess('Cadastrado efetuado com sucesso: '.$request->treino_id.'-'.$request->exercicio_id);

          return redirect($this->url);

        }catch (QueryException $e) {

          $_SESSION["message"] = $this->general->messageError('Erro ao inserir os dados! '.$e);

          return redirect($this->url);

      }catch(Exception $e){
      $_SESSION["message"] = $this->general->messageError('Erro ao inserir os dados! ');

      return redirect($this->url);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FormarTreino  $formarTreino
     * @return \Illuminate\Http\Response
     */
    public function show(FormarTreino $formarTreino)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FormarTreino  $formarTreino
     * @return \Illuminate\Http\Response
     */
    public function edit(FormarTreino $formarTreino)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FormarTreino  $formarTreino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormarTreino $formarTreino)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FormarTreino  $formarTreino
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormarTreino $formarTreino)
    {

      session_start();

      try {

        $formarTreino->delete();

        $_SESSION["message"] = $this->general->messageSuccess('exercicio deletado!');

        return redirect($this->url);

      } catch (Exception $e) {

        $_SESSION["message"] = $this->general->messageError('Erro ao deletar o Exercicio!');

        return redirect($this->url);

      }catch (QueryException $e){
        $_SESSION["message"] = $this->general->messageError('Erro ao deletar o Exercicio!');

        return redirect($this->url);
      }



    }
}
