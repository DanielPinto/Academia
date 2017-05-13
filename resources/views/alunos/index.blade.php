@extends('layouts.main')

@section('container')

  <div style="display:none;">

      <!-- Url  defoult-->
      {{$urlFunc = '/alunos'}}
      {{$srcFunc = ''}}

  </div>


  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">

        <div class="x_title">
          <h2>Listagem dos Alunos</h2>
          <div class="clearfix"></div>
        </div>


        <div class="x_content">

          <div class="clearfix"></div>

          <div class="row">

            @foreach ($data as $d)

              <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                <div class="well profile_view">
                  <div class="col-sm-12">
                    <h4 class="brief">{{$d->name}}</h4>
                    <div class="left col-xs-7">
                      <h2>{{$d->name}}</h2>
                      <p><strong>Telefone: </strong></p>
                      <p>{{$d->telefone_1}} <br/> {{$d->telefone_2}}</p>

                    </div>
                    <div class="right col-xs-5 text-center">
                      @if ($d->foto == 'user.png')
                        <img src="{{$srcFunc}}/images/profiles/{{$d->foto}}" alt="" class="img-circle img-responsive">
                      @else
                        <img src="{{$srcFunc}}/images/profiles/{{$d->id}}/{{$d->foto}}" alt="" class="img-circle img-responsive">

                      @endif

                    </div>
                  </div>
                  <div class="col-xs-12 bottom text-center">
                    <div class="col-xs-12 col-sm-6 emphasis">

                    </div>
                    <div class="col-xs-12 col-sm-6 emphasis">
                      <a href="{{url($urlFunc.'/'.$d->id)}}" class="btn btn-primary btn-xs">
                        <i class="fa fa-eye"> </i> Visualizar
                      </a>
                    </div>
                  </div>
                </div>
              </div>


            @endforeach


          </div>

        </div>
      </div>
    </div>
  </div>

@endsection
