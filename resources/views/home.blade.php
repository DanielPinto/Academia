@extends('layouts.main')


@section('container')

  <div style="display:none;">

      <!-- Url  defoult-->
      {{$urlHome = ''}}
      {{$srcHome = ''}}

  </div>



      <div class="panel panel-default">
        <div class="panel-heading">

          @if (Auth::User()->auth == 1)
            <h3 class="panel-title">Administrador</h3>
          @elseif (Auth::User()->auth == 2)
            <h3 class="panel-title">Funcionario</h3>
          @endif

        </div>
        <div class="panel-body">
          <p>Nome: {{Auth::User()->name}}</p>
          <p>Email: {{Auth::User()->email}}</p>
        </div>
        <div class="panel-footer">

        </div>
      </div>


@endsection
