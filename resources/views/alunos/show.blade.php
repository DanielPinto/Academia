@extends('layouts.main')


@section('container')

  <div style="display:none;">

      <!-- Url  defoult-->
      {{$urlFunc = '/alunos'}}
      {{$srcFunc = ''}}
      {{$urlUser = '/users'}}
      {{$urlAlunoTreino = '/alunoTreinos'}}

  </div>



<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">

      <div class="x_title">
        <h2>Perfil do Aluno</h2>

        <div class="clearfix"></div>
      </div>

      @if (isset($data))

      <div class="x_content">

        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

          <div class="profile_img">

            <!-- end of image cropping -->
            <div id="crop-avatar">
              <!-- Current avatar -->

              @if ($data->foto == 'user.png')
                <img class="img-responsive avatar-view" src="{{$srcFunc}}/images/profiles/{{$data->foto}}" alt="Avatar" title="Change the avatar">
              @else
                <img class="img-responsive avatar-view" src="{{$srcFunc}}/images/profiles/{{$data->id}}/{{$data->foto}}" alt="Avatar" title="Change the avatar">
              @endif

            </div>
            <!-- end of image cropping -->

          </div>



          <h3>{{$data->name}}</h3>

          <ul class="list-unstyled user_data">
            <li>
              @if ($data->status = 1)
                <i class="fa fa-check user-profile-icon"></i> Ativo

              @else
                <i class="fa fa-power-off user-profile-icon"></i> Inativo
              @endif

            </li>
            <li>
              <i class="fa fa-fa fa-birthday-cake user-profile-icon"></i> {{ $data->idade}} Anos
            </li>
          </ul>

          <button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-sm-foto"><i class="fa fa-camera"></i> Editar Foto</button>
          <br />

        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">

          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th style="width:20%">EMAIL:</th>
                  <td> {{$data->email}}</td>
                </tr>
                <tr>
                  <th>CPF:</th>
                  <td> {{$data->cpf}}</td>
                </tr>
                <tr>
                  <th>RG:</th>
                  <td> {{$data->rg}}</td>
                </tr>
                <tr>
                  <th>Telefone:</th>
                  <td> {{$data->telefone_1}} / {{$data->telefone_2}}</td>
                </tr>
                <tr>
                  <th>Endereço:</th>
                  <td>
                    {{$data->endereco}}, {{$data->numero}} - {{$data->complemento}} </br>
                    {{$data->bairro}} - {{$data->cidade}} - {{$data->uf}} CEP: {{$data->cep}}
                  </td>
                </tr>
                <tr>
                  <th>Data de Nascimento:</th>
                  <td> {{$data->data_nascimento}}</td>
                </tr>
                <tr>
                  <th>sexo:</th>
                  <td> {{$data->sexo}}</td>
                </tr>
                <tr>
                  <th>Profissão:</th>
                  <td> {{$data->profissao}}</td>
                </tr>
                <tr>
                  <th>Pagamento:</th>
                  <td> todo dia {{$data->dia_pagamento}} - {{$data->status_pagamento = (1) ? "pago" : "Aberto"}}</td>
                </tr>

              </tbody>
            </table>
          </div>

        </div>

        <div class="col-md-3 col-sm-3 col-xs-12">

          <a class="btn btn-warning" href="{{$urlFunc}}/{{ $data->id }}/edit"><i class="fa fa-edit m-right-xs"></i> Editar</a>
          @if ($data->status == 1)
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-sm-excluir"><i class="glyphicon glyphicon-off"></i> Desativar</button>
          @else
            <button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-sm-excluir"><i class="glyphicon glyphicon-ok"></i> Ativar</button>

          @endif



        </div>

      </div>

    @endif

    </div>
  </div>
</div>



<div class="clearfix"></div>
<div class="row">
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">

      <div class="x_title">
        <h3>
          Treino
          <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target=".bs-example-modal-sm-addTreino" >
            <span class="glyphicon glyphicon-plus"></span>
          </button>
        </h3>
        <div class="clearfix"></div>
      </div>

      <div class="x_content">
        <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">

        @foreach ($data->treinos as $treino)

          <div class="panel">

            <a class="panel-heading" role="tab" id="heading{{$treino->id}}" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$treino->id}}" aria-controls="collapse{{$treino->id}}">
              <h4 class="panel-title">
                {{$treino->name}} - <small>{{$treino->pivot->dia_semana}}</small>
              </h4>

            </a>

            <div id="collapse{{$treino->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$treino->id}}">

            <div class="panel-body">
              <button type="button" name="button" class="btn btn-xs btn-danger pull-right">
                <i class="fa fa-close"></i> deletar
              </button>
              <table class="table table-responsive table-hover">
                <thead>
                  <th>Exercicio</th>
                  <th>Aparelho</th>
                  <th>Peso</th>
                  <th>serie</th>
                  <th>Quantidade</th>
                  <th>Tempo</th>
                </thead>

                <tbody>

                  @foreach ($treino->exercicios as $e)

                    <tr>
                      <td>{{$e->name}}</td>
                      <td>{{$e->pivot->aparelho}}</td>
                      <td>{{$e->pivot->peso}}</td>
                      <td>{{$e->pivot->serie}}</td>
                      <td>{{$e->pivot->quantidade_serie}}</td>
                      <td>{{$e->pivot->tempo}}</td>
                    </tr>
                  @endforeach

                </tbody>

              </table>
            </div>
          </div>
        </div>

        @endforeach
      </div>
    </div>

  </div>
</div>

  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">

      <div class="x_title">
        <h2>IMC</h2>
        <div class="clearfix"></div>
      </div>

      <div class="x_content">

        <div class="row">
          <div class="col-md-6 col-xs-12">
            <h3>peso</h3>
            <h4>{{$data->peso}}</h4>

          </div>

          <div class="col-md-6 col-xs-12">
            <h3>altura</h3>
            <h4>{{$data->altura}}</h4>
          </div>

        </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="panel panel-default">
            <div class="panel-body">

              <div class="col-md-4 col-md-offset-">
                <h3>IMC</h3>
                <h4 class="label label-info">
                  {{$data->imc}}

                </h4>
              </div>

              <div class="col-md-4">

                @if ($data->statusIMC=="Peso Adequado")
                  <h3><i class="fa fa-thumbs-o-up"></i></h3>
                  <h4 class="label label-info">
                    {{$data->statusIMC}}
                  </h4>

                @else
                  <h3><i class="fa fa-thumbs-o-down"></i></h3>
                  <h4 class="label label-danger">
                    {{$data->statusIMC}}
                  </h4>

                @endif


              </div>

            </div>
          </div>
        </div>


      </div>

    </div>
  </div>
</div>

<!-- Modal edit Foto-->

<div class="modal fade bs-example-modal-sm-foto" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form class="" action="{{$urlFunc}}/foto/{{$data->id}}" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Editar Foto</h4>
        </div>
        <div class="modal-body">


            <div class="form-group">
              <label for="foto">Foto</label>
              <input type="file" class="form-control" id="foto" name="foto" required>
            </div>



        </div>
        <div class="modal-footer">
            <input type="hidden" name="_method" value="put">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
      </form>
    </div>
  </div>
</div>


@if ($data->status == 1)


<!-- Modal exclusão-->

<div class="modal fade bs-example-modal-sm-excluir" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">


        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Desativar o Aluno</h4>
        </div>

        <form action="{{$urlFunc}}/{{ $data->id }}" method="POST">
        <div class="modal-body">

          Você deseja Desativar o aluno {{$data->name}} ?

        </div>
        <div class="modal-footer">

          <input type="hidden" name="_method" value="delete">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">
            <i class="glyphicon glyphicon-trash"></i>
            Desativar
          </button>

        </div>

        </form>

    </div>
  </div>
</div>

@else


  <!-- Modal Recuperação-->

  <div class="modal fade bs-example-modal-sm-excluir" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">


          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Ativar o Aluno</h4>
          </div>

          <form action="{{$urlFunc}}/{{ $data->id }}" method="POST">
          <div class="modal-body">

            Você deseja Ativar o Aluno {{$data->name}} ?

          </div>
          <div class="modal-footer">

            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">
              <i class="glyphicon glyphicon-off"></i>
              Recuperar
            </button>

          </div>

          </form>

      </div>
    </div>
  </div>

@endif


<!--Adcionar Treino-->

<div class="modal fade bs-example-modal-sm-addTreino" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form class="" action="{{$urlAlunoTreino}}" method="POST" enctype="multipart/form-data">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Adcionar um Treino</h4>
        </div>
        <div class="modal-body">

                <div class="form-group">
                    <label for="dia_semana">Dia da Semana</label>
                    <select class="form-control" tabindex="-1" name="dia_semana" id="dia_semana">
                      <option value="Segunda-Feira">Segunda-Feira</option>
                      <option value="Terça-Feira">Terça-Feira</option>
                      <option value="Quarta-Feira">Quarta-Feira</option>
                      <option value="Quinta-Feira">Quinta-Feira</option>
                      <option value="Sexta-Feira">Sexta-Feira</option>
                      <option value="Sábado">Sábado</option>
                      <option value="Domingo">Domingo</option>
                    </select>
                  </div>

                  <div class="form-group">
                      <label for="treino_id">Treino</label>
                      <select class="form-control" tabindex="-1" name="treino_id" id="treino_id">

                        @foreach ($treinos as $t)
                            <option value="{{$t->id}}">{{$t->name}}</option>
                        @endforeach

                      </select>
                    </div>




        </div>
        <div class="modal-footer">
            <input type="hidden" name="aluno_id" value="{{$data->id}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Adcionar</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
