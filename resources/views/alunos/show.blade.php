@extends('layouts.main')


@section('container')

  <div style="display:none;">

      <!-- Url  defoult-->
      {{$urlFunc = '/alunos'}}
      {{$srcFunc = ''}}
      {{$urlUser = '/users'}}
      {{$urlAlunoTreino = '/alunoTreinos'}}
      {{$urlPagamento= '/pagamentos'}}
      {{$urlAvaliacoes= '/avaliacoes'}}


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
              @if ($data->status == 1)
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

          <div class="clearfix"></div>

        </div>

      </div>

    @endif

    </div>
  </div>
</div> {{--Fecha a 1 Row--}}





<div class="clearfix"></div>

{{--  abertura da 2 row--}}


<div class="row">

  {{--  abertura da 1col 2row--}}
  <div class="col-md-3 col-sm-3 col-xs-12">

      <div class="x_panel">

        <div class="x_title">
          <h4>IMC</h4>
          <div class="clearfix"></div>
        </div>

        <div class="x_content">

          <div class="row">
            <div class="col-md-6 col-xs-12">
              <h5>peso: {{$data->peso}}</h5>
            </div>
            <div class="col-md-6 col-xs-12">
              <h5>altura: {{$data->altura}}</h5>
            </div>

          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="panel panel-default">
              <div class="panel-body">

                <div class="col-md-12 col-xs-12">
                  <h4>IMC: <span class="label label-info">{{$data->imc}}</span></h4>
                </div>

                <div class="col-md-12 col-xs-12">

                  @if ($data->statusIMC=="Peso Adequado")

                    <h4 class="label label-info">
                      <i class="fa fa-thumbs-o-up"></i>
                      {{$data->statusIMC}}
                    </h4>

                  @else

                    <h4 class="label label-danger">
                      <i class="fa fa-thumbs-o-down"></i>
                      {{$data->statusIMC}}
                    </h4>
                  @endif


                </div>

              </div>
            </div>
          </div>


        </div>

      </div>

    </div> {{--Fecha a 1col 2row--}}


    {{--Abre a 2col 2row--}}

    <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="x_panel">

        <div class="x_title">
          <h4>Pagamentos Abertos</h4>
          <div class="clearfix"></div>
        </div>

        <div class="x_content">

          <div class="table-responsive">
            <table class="table" >
              <thead>
                <tr>
                  <th>Vencimento</th>
                  <th>Status</th>
                  <th>ação</th>
                </tr>
              </thead>
              <tbody>

                  @foreach ($data->pagamentos as $p)

                      @if ($p->status == 0)
                        <tr>
                        <td>{{$p->data_vencimento}}</td>
                        <td>

                          @if ($p->status_pagamento == 0)
                            <h5 class="label label-danger"> ATRASADO </h5>

                          @elseif ($p->status_pagamento == 1)
                            <h5 class="label label-primary"> ABERTO </h5>

                          @else
                            <h5 class="label label-warning"> HOJE </h5>

                          @endif

                        </td>
                        <td>
                          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-sm-pagamento{{ $p->id }}" >
                            <i class="fa fa-usd"></i> PAGAR
                          </button>
                        </td>
                        </tr>

                        {{--Modal Pagamento--}}
                        <div class="modal fade bs-example-modal-sm-pagamento{{ $p->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">


                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                  </button>
                                  <h4 class="modal-title" id="myModalLabel2">Pagar Mensalidade</h4>
                                </div>

                                <form action="{{$urlPagamento}}/{{ $p->id  }}" method="POST">
                                <div class="modal-body">
                                  Realizar o Pagamento?
                                </div>
                                <div class="modal-footer">
                                  <input type="hidden" name="aluno_id" value="{{$data->id}}">
                                  <input type="hidden" name="_method" value="put">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-usd"></i>
                                    Pagar
                                  </button>

                                </div>

                                </form>

                            </div>
                          </div>
                        </div>


                    @endif
                  @endforeach

              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
    {{--Fecha a 2col 2row--}}


    {{--Abre a 3col 2row--}}

    <div class="col-md-5 col-sm-5 col-xs-12">
      <div class="x_panel">

        <div class="x_title">
          <h4>Pagamentos Adiantados</h4>

          <div class="clearfix"></div>
        </div>

        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target=".bs-example-modal-sm-pagamento_adiantado" >
          <i class="fa fa-usd"></i> PAGAR ADIANTADO
        </button>

         <div class="clearfix"></div>

        <div class="x_content">


          <div class="table-responsive">
            <table class="table" >
              <thead>
                <tr>
                  <th>Vencimento</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>

                  @foreach ($data->pagamentos as $p)

                      @if ($p->status == 1)
                        @if ($p->status_pagamento == 3)

                          <tr>
                            <td>{{$p->data_vencimento}}</td>
                            <td>
                              <h5 class="label label-primary"> Pago </h5>
                            </td>
                          </tr>

                        @endif
                    @endif
                  @endforeach

              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
    {{--Fecha a 3col 2row--}}

</div>{{--Fecha a 2 row--}}


{{--Abre a 3row--}}

  <div class="row">

    {{--Abre a 1col da 3Row--}}
    <div class="col-md-5 col-sm-5 col-xs-12">
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

              <a class="panel-heading" role="tab" id="heading{{$treino->pivot->id }}" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$treino->pivot->id }}" aria-controls="collapse{{$treino->pivot->id }}">
                <h4 class="panel-title">
                  {{$treino->name}} - <small>{{$treino->pivot->dia_semana}}</small>
                </h4>

              </a>

              <div id="collapse{{$treino->pivot->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$treino->pivot->id}}">

              <div class="panel-body">

                <button type="button" class="btn btn-danger btn-xs pull-right" data-toggle="modal" data-target=".bs-example-modal-sm-deletaTreino{{ $treino->pivot->id }}" >
                  <i class="fa fa-trash-o"></i> deletar
                </button>

                <div class="table-responsive ">
                  <table class="tabletable-hover">
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
          </div>



          <!-- Modal exclusão de treinos-->

          <div class="modal fade bs-example-modal-sm-deletaTreino{{ $treino->pivot->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">


                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">Deletar Treino</h4>
                  </div>

                  <form action="{{$urlAlunoTreino}}/{{ $treino->pivot->id  }}" method="POST">
                  <div class="modal-body">

                    Você deseja Deletar o Treino?

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


          @endforeach
        </div>
      </div>

    </div>
  </div>{{--Fecha a 1col 3Row--}}

  </div>
{{--Fecha a 3row--}}






{{--Abre a 4row--}}

  <div class="row">

    {{--Abre a 1col da 4Row--}}
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">

        <div class="x_title">
          <h3>
            Avaliações
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target=".bs-example-modal-sm-addAvaliacao" >
              <span class="glyphicon glyphicon-plus"></span>
            </button>
          </h3>
          <div class="clearfix"></div>
        </div>

        <div class="x_content">

                <div class="table-responsive ">
                  <table id="datatable-responsive" class="table table-striped jambo_table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                    <thead>
                      <th>ID</th>
                      <th>Data</th>
                      <th>Nota</th>
                      <th>Ações</th>
                    </thead>

                    <tbody>

                      @foreach ($data->avaliacoes as $avaliacao)

                        <tr>
                          <td>{{$avaliacao->id}}</td>
                          <td>{{$avaliacao->data_avaliacao}}</td>
                          <td>{{$avaliacao->nota}}</td>
                          <td>
                            <a class="btn btn-warning" href="{{$urlAvaliacoes}}/edit/{{ $avaliacao->id }}"><i class="fa fa-edit" ></i></a>
                          </td>
                        </tr>
                      @endforeach

                    </tbody>

                  </table>
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




{{--Modal pagamento adiantado--}}
<div class="modal fade bs-example-modal-sm-pagamento_adiantado" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">


        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Adiantar Mensalidades</h4>
        </div>

        <form action="{{$urlPagamento}}/adiantamento" method="POST">

          <div class="modal-body">

            Quantas Parcelas deseja Pagar?
            <input type="number" class="form-control" value="" name="parcelas" id="tQtd">
            <input type="hidden" value="{{$data->plano->valor}}" id="tVlr">
            <input type="text" value="" id="tot">

          </div>


        <div class="modal-footer">
          <input type="hidden" name="aluno_id" value="{{$data->id}}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">
            <i class="fa fa-usd"></i>
            Pagar
          </button>

        </div>

        </form>

    </div>
  </div>
</div>



{{--Modal cria avaliação--}}
<div class="modal fade bs-example-modal-sm-addAvaliacao" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">


        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Criar Avalição</h4>
        </div>

        <form action="{{$urlAvaliacoes}}" method="POST">

          <div class="modal-body">


            <input type="date" class="form-control" name="data_avaliacao">
            <input type="hidden" name="aluno_id" value="{{$data->id}}">


          </div>


        <div class="modal-footer">

          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">
            <i class="fa fa-plus"></i>
            Criar
          </button>

        </div>

        </form>

    </div>
  </div>
</div>


@endsection
