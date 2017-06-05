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

        <div class="" role="tabpanel" data-example-id="togglable-tabs">

          <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">

            <li role="presentation" class="active"><a href="#tab_content1" id="ativos-tab" role="tab" data-toggle="tab" aria-expanded="true">Ativos</a>
            </li>
            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="desativado-tab" data-toggle="tab" aria-expanded="false">Desativados</a>
            </li>

          </ul>

          <div id="myTabContent" class="tab-content">

            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="ativos-tab">

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

                  @foreach ($data as $d)
                    @if ($d->status == 1)

                      <tr>
                        <td>
                          <div class="profile_pic">
                            @if ($d->foto =='user.png')
                              <img src="{{$srcFunc}}/images/profiles/{{$d->foto}}" class="avatar" alt="">
                            @else
                              <img src="{{$srcFunc}}/images/profiles/{{$d->id}}/{{$d->foto}}" class="avatar" alt="">

                            @endif
                          </div>
                        </td>
                        <td>{{$d->cpf}}</td>
                        <td>{{$d->name}}</td>
                        <td>{{$d->email}}</td>
                        <td>{{$d->telefone_1}} / {{$d->telefone_2}}</td>
                        <td><a href="{{$urlFunc}}/{{$d->id}}" class="btn btn-primary btn-xs"><i class="fa fa-user"></i> Perfil </a></td>
                      </tr>

                    @endif
                  @endforeach

                </tbody>
              </table>
            </div>

            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="desativado-tab">

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

                  @foreach ($data as $d)
                    @if ($d->status == 0)

                      <tr>
                        <td>
                          <div class="profile_pic">
                            @if ($d->foto =='user.png')
                              <img src="{{$srcFunc}}/images/profiles/{{$d->foto}}" class="avatar" alt="">
                            @else
                              <img src="{{$srcFunc}}/images/profiles/{{$d->id}}/{{$d->foto}}" class="avatar" alt="">

                            @endif
                          </div>
                        </td>
                        <td>{{$d->cpf}}</td>
                        <td>{{$d->name}}</td>
                        <td>{{$d->email}}</td>
                        <td>{{$d->telefone_1}} / {{$d->telefone_2}}</td>
                        <td><a href="{{$urlFunc}}/{{$d->id}}" class="btn btn-primary btn-xs"><i class="fa fa-user"></i> Perfil </a></td>
                      </tr>

                    @endif
                  @endforeach

                </tbody>
              </table>

            </div>

          </div>

        </div>

      </div>
    </div>
  </div>
</div>


@endsection
