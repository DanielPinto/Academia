<?php

namespace App\Http\Controllers;

use App\Models\Treino;
use App\Services\GeneralService;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class TreinoController extends Controller
{



  private $model;
  private $general;

  public function __construct(GeneralService $general ,  Treino $model)
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

      return view('treinos.index')->with('data', $data);
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
            'status' => $request->status,
          ];



          $data = $this->model->create($insert);

          $url = $request->url;

          $_SESSION["message"] = $this->general->messageSuccess('Treino Cadastrado com sucesso!');

          return redirect($url);

        }catch (QueryException $e) {

          $_SESSION["message"] = $this->general->messageError('Erro ao inserir os dados! '.$e);

          return redirect($url);

      }catch(Exception $e){
      $_SESSION["message"] = $this->general->messageError('Erro ao inserir os dados! ');

      return redirect($url);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Treino  $treino
     * @return \Illuminate\Http\Response
     */
    public function show(Treino $treino)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Treino  $treino
     * @return \Illuminate\Http\Response
     */
    public function edit(Treino $treino)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Treino  $treino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      try {
          session_start();

          $data = $this->model->find($id);

          $data->name = $request->name;
          $data->save();

          $_SESSION["message"] = $this->general->messageSuccess('Dados inseridos com sucesso!');

          return redirect('treinos');

        } catch (\Exception $e)
        {
          $_SESSION["message"] = $this->general->messageSuccess('Erro ao inserir os dados! ');
          return redirect('treinos');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Treino  $treino
     * @return \Illuminate\Http\Response
     */
    public function destroy(Treino $treino)
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

          return redirect('treinos');

        } catch (\Exception $e)
        {
          $_SESSION["message"] = $this->general->messageSuccess('Erro ao alterar o status! ');
          return redirect('treinos');

        }

    }
}
