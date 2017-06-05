<?php

namespace App\Http\Controllers;

use App\Models\Pagamento;
use App\Services\GeneralService;
use App\Services\PagService;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{

  private $general;
  private $url;
  private $urlPag;
  private $model;
  private $pag_service;

  public function __construct(GeneralService $general, Pagamento $pagamento, PagService $pag_service)
  {

     $this->middleware('auth');
     $this->middleware('role');
     $this->general = $general;
     $this->url = 'alunos';
     $this->urlPag = 'pagamentos';
     $this->model = $pagamento;
     $this->pag_service = $pag_service;

   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      session_start();

      $this->pag_service->pagamento();

      $data = $this->model->with('aluno')->get();

      if (isset($_SESSION["message"])) {

        $data->message = $_SESSION["message"];
        unset($_SESSION["message"]);
      }

      return view($this->urlPag.'.index')->with('data', $data);


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


    }

      /**
      * Display the specified resource.
      *
      * @param  \App\Models\Pagamento  $pagamento
      * @return \Illuminate\Http\Response
      */
      public function show($id)
      {
      session_start();

      $treinos = $this->treino->all();
      $data = $this->model->with('treinos')->with('pagamentos')->find($id);

      if($data == null){

        $_SESSION["message"] = $this->general->messageError('Aluno não Existente!');

        return redirect($this->url);
      }

      if (isset($_SESSION["message"])) {
        $data->message = $_SESSION["message"];
        unset($_SESSION["message"]);
      }


      $idade = $this->service->calc_idade($data->data_nascimento);
      $data->idade = $idade;

      $data->data_nascimento = $this->general->dateInverse($data->data_nascimento);
      //$data->proximo_pagamento = $this->general->dateInverse($data->proximo_pagamento);

      //$data = $this->pagamento_service->statusPagamento($data);

      $statusIMC = $this->service->statusIMC($data->imc,$data->sexo,$idade);
      $data->statusIMC = $statusIMC;

      return view($this->url.'.show')->with('data', $data)->with('treinos', $treinos);
      }

      /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Models\Pagamento  $pagamento
      * @return \Illuminate\Http\Response
      */
      public function edit($id)
      {

      }

      /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Models\Pagamento  $pagamento
      * @return \Illuminate\Http\Response
      */
      public function update(Request $request, $id)
      {
      try {
          session_start();

          $pagamento = $this->model->find($id);
          $date = date('Y-m-d');
          $pagamento->data_pagamento = $date;
          $pagamento->status = 1;

          $pagamento->save();

          $_SESSION["message"] = $this->general->messageSuccess('Pagamento realizado com sucesso!');

          return redirect($this->url.'/'.$request->aluno_id);

        }catch (\Exception $e)
        {
          $_SESSION["message"] = $this->general->messageError('Erro ao efetuar o Pagamento! ');
          return redirect($this->url.'/'.$request->aluno_id);

        }



    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pagamento  $pagamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pagamento $pagamento)
    {
        //
    }


    public function adiantamento(Request $request)
    {

      session_start();

      $parcelas = $request->parcelas;
      $aluno_id = $request->aluno_id;

      try {

        $status = $this->pag_service->adiantamento($aluno_id , $parcelas);

        if($status == 1){
          $_SESSION["message"] = $this->general->messageSuccess('Pagamentos efetuado com sucesso!');
        }else {
          $_SESSION["message"] = $this->general->messageError('Ocorreu algum problema!');
        }

        return redirect($this->url.'/'.$aluno_id);

      } catch (Exception $e) {

          return $e;
      }


    }

}
