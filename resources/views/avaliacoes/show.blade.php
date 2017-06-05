@extends('layouts.main')


@section('container')

  <div style="display:none;">

      <!-- Url  defoult-->
      {{$urlAv = '/formarAvaliacao'}}
      {{$srcFunc = ''}}

  </div>



<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">

      <div class="x_title">
        <h2>Avaliação</h2>

        <div class="clearfix"></div>
      </div>

      @if (isset($data))

      <div class="x_content">

        <p>
          Data da Avaliação: {{$data->data_avaliacao}}
        </p>
        <p>
          NOME: {{$data->aluno->name}}
        </p>
        <p>
          Nota: {{$data->nota}}
        </p>

      </div>


    @endif

    </div>
  </div>
</div> {{--Fecha a 1 Row--}}


<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">

      <div class="x_title">
        <h2>Exercicios</h2>

        <div class="clearfix"></div>
      </div>

      <div class="x_content">

        <button type="button" class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target=".bs-example-modal-sm-addexercicio">
          <i class="fa fa-plus"></i>
          Exercicio
        </button>


        <div class="table-responsive">
          <h2>Nome</h2>


          <table class="table table-striped">
            <thead>
              <th>Nome</th>
              <th>Aparelho</th>
              <th>Peso</th>
              <th>Serie</th>
              <th>Quantidade de Serie</th>
              <th>Tempo</th>
              <th>Ação</th>
            </thead>
            <tbody>

            @foreach ($data->exercicios as $e)
                <tr>
                  <td><strong>{{$e->name}} :</strong></td>
                  <td>{{$e->pivot->aparelho}}</td>
                  <td>{{$e->pivot->peso}}</td>
                  <td>{{$e->pivot->serie}}</td>
                  <td>{{$e->pivot->quantidade_serie}}</td>
                  <td>{{$e->pivot->tempo}}</td>
                  <td>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".bs-example-modal-sm-excluir{{ $e->pivot->id }}">
                      <i class="fa fa-minus"> </i>
                    </button>
                  </td>
                </tr>


                <!--excluir exercicio-->
                <div class="modal fade bs-example-modal-sm-excluir{{ $e->pivot->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">


                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Deletar Exercício</h4>
                        </div>

                        <form action="{{$urlAv}}/{{ $e->pivot->id }}" method="POST">
                        <div class="modal-body">

                          Você deseja deletar o Exercício {{$e->name}} ?

                        </div>
                        <div class="modal-footer">

                          <input type="hidden" name="_method" value="delete">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-danger">
                            <i class="glyphicon glyphicon-trash"></i>
                            Deletar
                          </button>

                        </div>

                        </form>

                    </div>
                  </div>
                </div>
                <!--/excluir exercicio-->



            @endforeach

          </tbody>

          </table>

        </div>
      </div>
    </div>
  </div>
</div>




<div class="modal fade bs-example-modal-sm-addexercicio" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form class="" action="{{$urlAv}}" method="POST" enctype="multipart/form-data">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Adcionar um Exercicio</h4>
        </div>
        <div class="modal-body">


            <label for="exercicio_id">Exercicio</label>
            <select class="select2_single form-control" tabindex="-1" name="exercicio_id" id="exercicio_id" required>
              <option></option>
              @foreach ($tipoExe as $t)
                <option value= "{{$t->id}}">{{$t->name}}</option>
              @endforeach

            </select>



          <input type="hidden" name="avaliacao_id" value="{{$data->id}}">

            <div class="form-group">
              <label for="aparelho">Aparelho</label>
              <input type="text" class="form-control" id="aparelho" name="aparelho" required>
            </div>

            <div class="form-group">
              <label for="peso">Peso</label>
              <input type="text" class="form-control" id="peso" name="peso" value="0" required>
            </div>

            <div class="form-group">
              <label for="serie">Serie</label>
              <input type="number" class="form-control" id="serie" name="serie" value="0" required>
            </div>

            <div class="form-group">
              <label for="quantidade_serie">Quantidade de Serie</label>
              <input type="number" class="form-control" id="quantidade_serie" name="quantidade_serie" value="0" required>
            </div>

            <div class="form-group">
              <label for="tempo">Tempo em Minutos</label>
              <input type="text" class="form-control" id="tempo" name="tempo" value="0" pattern="\d{2}:\d{2}" required>
              <span class="label-info text-warning">Formato: <small>00:00</small></span>
            </div>



        </div>
        <div class="modal-footer">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Adcionar</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
