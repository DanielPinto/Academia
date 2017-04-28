<?php

namespace App\Http\Controllers;

use App\Models\Plano;
use App\Services\GeneralService;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class PlanoController extends Controller
{

  private $model;
  private $general;

  public function __construct(GeneralService $general ,  Plano $model)
  {

     $this->middleware('auth');
     $this->model = $model;
     $this->general = $general;

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

      return view('planos.index')->with('data', $data);

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
            'name' => $request->name,
            'dias' => $request->dias,
            'valor' => $request->valor,
            'status' => $request->status,
          ];



          $data = $this->model->create($insert);

          $_SESSION["message"] = $this->general->messageSuccess('Plano Cadastrado com sucesso!');

          return redirect('planos');

        }catch (QueryException $e) {

          $_SESSION["message"] = $this->general->messageError('Erro ao inserir os dados! '.$e);

          return redirect('planos');

      }catch(Exception $e){
      $_SESSION["message"] = $this->general->messageError('Erro ao inserir os dados! ');

      return redirect('planos');
    }
  }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plano  $plano
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plano  $plano
     * @return \Illuminate\Http\Response
     */
    public function edit(Plano $plano)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plano  $plano
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      try {
          session_start();

          $data = $this->model->find($id);

          $data->name = $request->name;
          $data->dias = $request->dias;
          $data->valor = $request->valor;

          $data->save();

          $_SESSION["message"] = $this->general->messageSuccess('Dados inseridos com sucesso!');

          return redirect('planos');

        } catch (\Exception $e)
        {
          $_SESSION["message"] = $this->general->messageSuccess('Erro ao inserir os dados! ');
          return redirect('planos');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plano  $plano
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plano $plano)
    {
        //
    }



    public function status(Request $request, $id)
    {
      try {
          session_start();

          $data = $this->model->find($id);

          if ($data->status == 0) {
            $data->status = 1;
          }else {
            $data->status = 0;
          }


          $data->save();

          $_SESSION["message"] = $this->general->messageSuccess('Status alterado com sucesso!');

          return redirect('planos');

        } catch (\Exception $e)
        {
          $_SESSION["message"] = $this->general->messageSuccess('Erro ao alterar o status! ');
          return redirect('planos');

        }

    }
}
