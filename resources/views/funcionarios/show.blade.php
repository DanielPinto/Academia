@extends('layouts.main')


@section('container')

  <div style="display:none;">

      <!-- Url  defoult-->
      {{$urlFunc = '/funcionarios'}}
      {{$srcFunc = ''}}
      {{$urlUser = '/users'}}

  </div>



<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">

      <div class="x_title">
        <h2>Perfil do funcionario</h2>

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
              <i class="fa fa-briefcase user-profile-icon"></i> {{$data->funcao}}
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
                  <th>Idade:</th>
                  <td> {{$data->idade}}</td>
                </tr>
                <tr>
                  <th>sexo:</th>
                  <td> {{$data->sexo}}</td>
                </tr>
                <tr>
                  <th>Admição:</th>
                  <td> {{$data->data_admissao}}</td>
                </tr>
                <tr>
                  <th>salario:</th>
                  <td> {{$data->salario}}</td>
                </tr>

              </tbody>
            </table>
          </div>



          @if ($data->user == null)


              <button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-sm-newUser">
                <i class="fa fa-users"></i>
                Criar um usuário no Sistema para este Funcionário
              </button>

          @elseif ($data->user->status == 0)


              <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-sm-onUser">
                <i class="fa fa-users"></i>
                Reativar o usuário deste Funcionário
              </button>

          @else


              <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-sm-ofUser">
                <i class="fa fa-users"></i>
                Desativar o usuário deste Funcionário
              </button>

          @endif



        </div>

        <div class="col-md-3 col-sm-3 col-xs-12">

          <a class="btn btn-warning" href="{{$urlFunc}}/{{ $data->id }}/edit"><i class="fa fa-edit m-right-xs"></i> Editar</a>
          @if ($data->status == 1)
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-sm-excluir"><i class="glyphicon glyphicon-trash"></i> Excluir</button>
          @else
            <button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-sm-excluir"><i class="glyphicon glyphicon-off"></i> Recuperar</button>

          @endif



        </div>

      </div>

    @endif

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
          <h4 class="modal-title" id="myModalLabel2">Deletar Funcionário</h4>
        </div>

        <form action="{{$urlFunc}}/{{ $data->id }}" method="POST">
        <div class="modal-body">

          Você deseja deletar o Funcionário {{$data->name}} ?

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

@else


  <!-- Modal Recuperação-->

  <div class="modal fade bs-example-modal-sm-excluir" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">


          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Recuperar Funcionário</h4>
          </div>

          <form action="{{$urlFunc}}/{{ $data->id }}" method="POST">
          <div class="modal-body">

            Você deseja Recuperar o Funcionário {{$data->name}} ?

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

<!-- Modal Create usuario-->

<div class="modal fade bs-example-modal-sm-newUser" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">


        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Criar Usuário</h4>
        </div>

        <form action="{{$urlUser}}/newUser/{{ $data->id }}" method="POST">
        <div class="modal-body">

          <div class="form-group">

            <h4>Autorização:</h4>
            <p>

              <input type="radio" class="flat" name="auth" id="admin" value="1" checked="" required /> <label for="admin">Administrador</label>
            </p>
            <p>

              <input type="radio" class="flat" name="auth" id="inst" value="2" /> <label for="inst">Instrutor:</label>
            </p>

          </div>

        </div>
        <div class="modal-footer">

          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">

            Criar
          </button>

        </div>

        </form>

    </div>
  </div>
</div>


@if (isset($data->user->id))

<!-- Modal Desativa usuario-->

<div class="modal fade bs-example-modal-sm-ofUser" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">


        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Desativar Usuário</h4>
        </div>

        <form action="{{$urlUser}}/statusUser/{{$data->user->id}}" method="POST">
        <div class="modal-body">

          <div class="form-group">

            <h4>Desativar o Usuário do Funcionário?</h4>


          </div>

        </div>
        <div class="modal-footer">
          <input type="hidden" name="funcionario" value="{{$data->id}}">
          <input type="hidden" name="_method" value="put">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">

            OK
          </button>

        </div>

        </form>

    </div>
  </div>
</div>



<!-- Modal Ativar usuario-->

<div class="modal fade bs-example-modal-sm-onUser" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">


        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Ativar Usuário</h4>
        </div>

        <form action="{{$urlUser}}/statusUser/{{ $data->user->id }}" method="POST">
        <div class="modal-body">

          <div class="form-group">

            <h4>Ativar o Usuário do Funcionário?</h4>


          </div>

        </div>
        <div class="modal-footer">
          <input type="hidden" name="funcionario" value="{{$data->id}}">
          <input type="hidden" name="_method" value="put">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">

            OK
          </button>

        </div>

        </form>

    </div>
  </div>
</div>

@endif




@endsection
