<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Plano;
use App\Models\Treino;
use App\Models\Pagamento;
use App\Models\Categoria;
use App\Services\PagService;
use App\Services\GeneralService;
use App\Services\AlunoService;
use Illuminate\Http\Request;

class AlunoController extends Controller
{



        private $model;
        private $general;
        private $url;
        private $plano;
        private $treino;
        private $service;
        private $categoria;
        private $pagamento;
        private $pag_service;


        public function __construct(
          GeneralService $general,
          Aluno $model,
          Plano $plano,
          Treino $treino,
          AlunoService $service,
          Categoria $categoria,
          Pagamento $pagamento,
          PagService $pag_service
        )
        {

           $this->middleware('auth');
           $this->middleware('role', ['except'=>['index']]);
           $this->model = $model;
           $this->general = $general;
           $this->url = 'alunos';
           $this->plano = $plano;
           $this->treino = $treino;
           $this->service = $service;
           $this->categoria = $categoria;
           $this->pagamento = $pagamento;
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
      $categorias = $this->categoria->all();
      $planos = $this->plano->all();
      return view($this->url.'.create')->with('categorias', $categorias)->with('planos', $planos);
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

        $imc = $this->service->calculaIMC($request->altura,$request->peso);
        $data_cadastro = date('Y-m-d');

          $aluno =[
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
            'data_nascimento' => $request->data_nascimento,
            'profissao' => $request->profissao,
            'dia_pagamento' => $request->dia_pagamento,
            'peso' => $request->peso,
            'altura' => $request->altura,
            'imc' => $imc,
            'foto' => 'user.png',
            'status'=>1,
            'data_cadastro'=> $data_cadastro,
            'atividade_diaria' => $request->atividade_diaria,
            'historico_atividade' => $request->historico_atividade,
            'categoria_id' => $request->categoria_id,
            'plano_id' => $request->plano_id,

          ];

          $data = $this->model->create($aluno);

          $plano = $this->plano->find($data->plano_id);

          $pag = $this->pag_service->primeiroPagamento($data->id, $plano->valor, $data->data_cadastro, $data->dia_pagamento);


          $_SESSION["message"] = $this->general->messageSuccess('Aluno Cadastrado com sucesso!');

          return redirect($this->url.'/'.$data->id);

        }catch (QueryException $e) {

          $_SESSION["message"] = $this->general->messageSuccess('Erro ao inserir os dados! ');

          return redirect($this->url.'/create');

      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      session_start();

      $treinos = $this->treino->all();
      $data = $this->model->with('treinos')->with('pagamentos')->with('avaliacoes')->with('plano')->find($id);

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

      $statusIMC = $this->service->statusIMC($data->imc,$data->sexo,$idade);
      $data->statusIMC = $statusIMC;

      $data->pagamentos = $this->pag_service->statusPagamento($data->pagamentos);

      return view($this->url.'.show')->with('data', $data)->with('treinos', $treinos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data = $this->model->find($id);

      $categorias = $this->categoria->all();
      $planos = $this->plano->all();

      if(!$data)
        abort(404);

      $date = date_create($data->data_nascimento);
      $data->data_nascimento = date_format($date,'Y-m-d');


      return view($this->url.'.edit')->with('data', $data)->with('categorias', $categorias)->with('planos', $planos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      try {
          session_start();

          $aluno = $this->model->find($id);
          $imc = $this->service->calculaIMC($request->altura,$request->peso);

          $aluno->name = $request->name;
          $aluno->email = $request->email;
          $aluno->cpf = $request->cpf;
          $aluno->rg = $request->rg;
          $aluno->telefone_1 = $request->telefone_1;
          $aluno->telefone_2 = $request->telefone_2;
          $aluno->cep = $request->cep;
          $aluno->endereco = $request->endereco;
          $aluno->numero = $request->numero;
          $aluno->complemento = $request->complemento;
          $aluno->bairro = $request->bairro;
          $aluno->cidade = $request->cidade;
          $aluno->uf = $request->uf;
          $aluno->sexo = $request->sexo;
          $aluno->data_nascimento = $request->data_nascimento;
          $aluno->profissao = $request->profissao;
          $aluno->dia_pagamento = $request->dia_pagamento;
          $aluno->peso = $request->peso;
          $aluno->altura = $request->altura;
          $aluno->imc = $imc;
          $aluno->atividade_diaria = $request->atividade_diaria;
          $aluno->historico_atividade = $request->historico_atividade;
          $aluno->categoria_id = $request->categoria_id;
          $aluno->plano_id = $request->plano_id;

          $aluno->save();




          $_SESSION["message"] = $this->general->messageSuccess('Dados inseridos com sucesso!');

          return redirect($this->url.'/'.$id);

        } catch (\Exception $e)
        {
          $_SESSION["message"] = $this->general->messageSuccess('Erro ao inserir os dados! ');
          return redirect($this->url.'/'.$id);

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      try {
          session_start();

          $aluno = Aluno::find($id);
          $message = '';

          if ($aluno->status == 1) {
            $aluno->status = 0;
            $message = "Aluno Desativado!";

          }else{
            $aluno->status = 1;
            $message = "Aluno Ativado!";
          }

          $aluno->save();



          $_SESSION["message"] = $this->general->messageSuccess($message);
          return redirect($this->url.'/'.$id);

        } catch (\Exception $e)
        {
          $_SESSION["message"] = $this->general->messageSuccess('Erro ao inserir os dados! ');
          return redirect($this->url.'/'.$id);

        }
      }



//======================================================================================




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



        return redirect($this->url.'/'.$id);


      } catch (Exception $e) {
        return $e->getMessage();
      }

    }


}
