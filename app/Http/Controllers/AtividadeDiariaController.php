<?php

namespace App\Http\Controllers;

use App\Models\AtividadeDiaria;
use App\Services\GeneralService;
use Illuminate\Http\Request;

class AtividadeDiariaController extends Controller
{


  private $model;
  private $general;
  private $url;

  public function __construct(GeneralService $general ,  AtividadeDiaria $model)
  {

     $this->middleware('auth');
       $this->middleware('role');
     $this->model = $model;
     $this->general = $general;
     $this->url = 'atividadeDiaria';

   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      session_start();

      $data = $this->model->all();

      if (isset($_SESSION["message"])) {

        $data->message = $_SESSION["message"];
        unset($_SESSION["message"]);
      }

      return view($this->url.'.index')->with('data', $data);
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
              'categoria' => $request->categoria,
            ];

            $data = $this->model->create($insert);


            $_SESSION["message"] = $this->general->messageSuccess('Cadastrado efetuado com sucesso!');

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
     * @param  \App\Models\AtividadeDiaria  $atividadeDiaria
     * @return \Illuminate\Http\Response
     */
    public function show(AtividadeDiaria $atividadeDiaria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AtividadeDiaria  $atividadeDiaria
     * @return \Illuminate\Http\Response
     */
    public function edit(AtividadeDiaria $atividadeDiaria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AtividadeDiaria  $atividadeDiaria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {

      try {
          session_start();

          $data = $this->model->find($id);

          $data->categoria = $request->categoria;

          $data->save();

          $_SESSION["message"] = $this->general->messageSuccess('Dados inseridos com sucesso!');

          return redirect($this->url);

        } catch (\Exception $e)
        {
          $_SESSION["message"] = $this->general->messageSuccess('Erro ao inserir os dados! ');
          return redirect($this->url);

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AtividadeDiaria  $atividadeDiaria
     * @return \Illuminate\Http\Response
     */
    public function destroy(AtividadeDiaria $atividadeDiaria)
    {
        //
    }
}
