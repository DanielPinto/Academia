@extends('layouts.main')

@section('container')

  <div style="display:none;">

      <!-- Url  defoult-->
      {{$urlFunc = '/funcionarios'}}
      {{$srcFunc = ''}}

  </div>


  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">

        <div class="x_title">
          <h2>Listagem de Funcionário</h2>
          <div class="clearfix"></div>
        </div>


        <div class="x_content">
          <div class="clearfix"></div>
          <table id="datatable-responsive" class="table table-striped jambo_table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr class="headings">
                <th>Foto</th>
                <th>CPF</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Mostrar Perfil</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $funcionario)
                <tr>
                  <td>
                    <div class="profile_pic">
                      @if ($funcionario->foto =='user.png')
                        <img src="{{$srcFunc}}/images/profiles/{{$funcionario->foto}}" class="avatar" alt="">
                      @else
                        <img src="{{$srcFunc}}/images/profiles/{{$funcionario->id}}/{{$funcionario->foto}}" class="avatar" alt="">

                      @endif
                    </div>
                  </td>
                  <td>{{$funcionario->cpf}}</td>
                  <td>{{$funcionario->name}}</td>
                  <td>{{$funcionario->email}}</td>
                  <td>{{$funcionario->telefone_1}} / {{$funcionario->telefone_2}}</td>
                  <td><a href="{{$urlFunc}}/{{$funcionario->id}}" class="btn btn-primary btn-xs"><i class="fa fa-user"></i> Perfil </a></td>
                </tr>

              @endforeach

            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>

@endsection
