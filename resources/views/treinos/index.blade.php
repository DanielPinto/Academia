@extends('layouts.main')

@section('container')

  <div style="display:none;">

      <!-- Url  defoult-->
      {{$urlPlano = '/treinos'}}
      {{$srcPlano = ''}}

  </div>


  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">

        <div class="x_title">
          <h2>Listagem de Tipos de Treinos</h2>
          <div class="clearfix"></div>
        </div>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm-add"><i class="glyphicon glyphicon-plus"></i> Adcionar</button>

        <div class="x_content">

          <br />
          <div class="row">
            <div class="col-md-12">

          <table id="datatable-responsive" class="table table-striped jambo_table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr class="headings">
                <th>Nome</th>
                <th>Status</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $d)
                <tr>
                  <td>{{$d->name}}</td>
                  <td>
                    @if ($d->status == 0)
                      Desativado <i class="fa fa-times-circle"></i>

                    @else
                      Ativado <i class="fa fa-check-circle"></i>
                    @endif
                  </td>
                  <td>

                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".bs-example-modal-sm-editar-{{$d->id}}" title="Editar"><i class="fa fa-edit"></i></button>

                    @if ($d->status == 0)
                      <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target=".bs-example-modal-sm-status-{{$d->id}}" title="Ativar"><i class="fa fa-check"></i></button>
                    @else
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".bs-example-modal-sm-status-{{$d->id}}" title="Desativar"><i class="fa fa-remove"></i></button>
                    @endif

                  </td>
                </tr>



                <!-- Modal Editar-->

                <div class="modal fade bs-example-modal-sm-editar-{{$d->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <form class="" action="{{$urlPlano}}/{{$d->id}}" method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Editar o Tipo de Treino</h4>
                        </div>
                        <div class="modal-body">


                            <div class="form-group">
                              <label for="name">Nome</label>
                              <input type="text" class="form-control" id="name" name="name" value="{{$d->name}}" required>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <input type="hidden" name="_method" value="put">
                          <button type="submit" class="btn btn-primary">Editar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>



                <!-- Modal Status-->

                <div class="modal fade bs-example-modal-sm-status-{{$d->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <form class="" action="{{$urlPlano}}/status/{{$d->id}}" method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>

                          <h4 class="modal-title" id="myModalLabel2">Status</h4>
                        </div>

                        <div class="modal-body">
                            @if ($d->status == 0)
                              Deseja Ativar este Tipo de Treino?
                            @else
                              Deseja Desativar este Tipo de Treino?
                            @endif

                        </div>

                        <div class="modal-footer">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <input type="hidden" name="status" value="">
                          <input type="hidden" name="_method" value="put">
                          <button type="submit" class="btn btn-primary">
                            @if ($d->status == 0)
                              Ativar
                            @else
                              Desativar
                            @endif

                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>



              @endforeach

            </tbody>
          </table>

          </div>
        </div>

        </div>
      </div>
    </div>
  </div>





  <!-- Modal adcionar-->

  <div class="modal fade bs-example-modal-sm-add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <form class="" action="{{$urlPlano}}" method="POST" enctype="multipart/form-data">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Adcionar um Tipo de Treino</h4>
          </div>
          <div class="modal-body">


              <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>

              <input type="hidden" name="url" value="treinos">

              <div class="form-group">

                  <label>Status</label>
                  <p>
                    <input type="radio" class="flat" name="status" id="ativado" value="1" checked="" required /> <label for="ativado">Ativado</label>
                  </p>
                  <p>
                    <input type="radio" class="flat" name="status" id="desativado" value="0" required /> <label for="desativado">Desativado</label>
                  </p>

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
