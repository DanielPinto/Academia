<?php

namespace App\Http\Controllers;

use App\FormarAval;
use App\Services\GeneralService;
use Illuminate\Http\Request;

class FormarAvaliacaoController extends Controller
{



  private $formarAvaliacao;
  private $general;
  private $url;

  public function __construct(GeneralService $general , FormarAval $formarAvaliacao)
  {

     $this->middleware('auth');
     $this->formarAvaliacao = $formarAvaliacao;
     $this->general = $general;
     $this->url = 'avaliacoes';

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
        try{

                $insert =[

                  'avaliacao_id' => $request->avaliacao_id,
                  'exercicio_id' => $request->exercicio_id,
                  'aparelho' => $request->aparelho,
                  'peso' => $request->peso,
                  'serie' => $request->serie,
                  'quantidade_serie' => $request->quantidade_serie,
                  'tempo' => $request->tempo,
                ];


                $data = $this->formarAvaliacao->create($insert);

                $_SESSION["message"] = $this->general->messageSuccess('Cadastrado efetuado com sucesso');

                return redirect($this->url.'/'.$request->avaliacao_id);

              }catch (QueryException $e) {

                $_SESSION["message"] = $this->general->messageError('Erro ao inserir os dados! ');

                return redirect($this->url.'/'.$request->avaliacao_id);

            }catch(Exception $e){
            $_SESSION["message"] = $this->general->messageError('Erro ao inserir os dados! ');

            return redirect($this->url.'/'.$request->avaliacao_id);
          }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormarAvaliacao  $formarAvaliacao
     * @return \Illuminate\Http\Response
     */
    public function show(FormarAvaliacao $formarAvaliacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormarAvaliacao  $formarAvaliacao
     * @return \Illuminate\Http\Response
     */
    public function edit(FormarAvaliacao $formarAvaliacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FormarAvaliacao  $formarAvaliacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormarAvaliacao $formarAvaliacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormarAvaliacao  $formarAvaliacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormarAvaliacao $formarAvaliacao)
    {
        //
    }
}
