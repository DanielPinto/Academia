@extends('layouts.main')

@section('container')

  <div style="display:none;">

      <!-- Url  defoult-->
      {{$urlPlano = '/categoria'}}
      {{$srcPlano = ''}}

  </div>


  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">

        <div class="x_title">
          <h2>Listagem de Categoria</h2>
          <div class="clearfix"></div>
        </div>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm-add"><i class="glyphicon glyphicon-plus"></i> Adcionar</button>

        <div class="x_content">

          <br />
          <table id="datatable-responsive" class="table table-striped jambo_table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr class="headings">
                <th>Nome</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $d)
                <tr>
                  <td>{{$d->categoria}}</td>
                  <td>

                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".bs-example-modal-sm-editar-{{$d->id}}" title="Editar"><i class="fa fa-edit"></i></button>
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
                          <h4 class="modal-title" id="myModalLabel2">Editar a Categoria</h4>
                        </div>
                        <div class="modal-body">


                            <div class="form-group">
                              <label for="categoria">Nome da Categoria</label>
                              <input type="text" class="form-control" id="categoria" name="categoria" value="{{$d->categoria}}" required>
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


              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>





  <!-- Modal adcionar-->

  <div class="modal fade bs-example-modal-sm-add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form class="" action="{{$urlPlano}}" method="POST" enctype="multipart/form-data">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Adcionar uma Categoria</h4>
          </div>
          <div class="modal-body">

              <div class="row">

                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="categoria">Nome da Categoria</label>
                    <input type="text" class="form-control" id="categoria" name="categoria" required>
                  </div>
                </div>

              </div>

          </div>
          <div class="modal-footer">
              <input type="hidden" name="url" value="exercicios">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Adcionar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
