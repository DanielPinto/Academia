@extends('layouts.main')

@section('container')

  <div style="display:none;">

      <!-- Url  defoult-->
      {{$urlFunc = '/avaliacoes'}}
      {{$srcFunc = ''}}

  </div>


  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">

        <div class="x_title">
          <h2>Listagem das Avaliações</h2>
          <div class="clearfix"></div>
        </div>


        <div class="x_content">

          <div class="clearfix"></div>

          <table id="datatable-responsive" class="table table-striped jambo_table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr class="headings">
                <th>Data</th>
                <th>Aluno</th>
                <th>Nota</th>
                <th>Mostrar Perfil</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $d)
                <tr>
                  <td>{{$d->data_avaliacao}}</td>
                  <td>{{$d->aluno->name}}</td>
                  <td>{{$d->nota}}</td>
                  <td><a href="{{$urlFunc}}/{{$d->id}}" class="btn btn-primary btn-xs"><i class="fa fa-user"></i> Perfil </a></td>
                </tr>

              @endforeach

            </tbody>
          </table>


        </div>
      </div>
    </div>
  </div>

@endsection
