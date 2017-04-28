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
        <h2>Editar Perfil do Funcionário {{$data->name}}</h2>
        <div class="clearfix"></div>
      </div>


      <div class="x_content">

        <a href="{{$urlFunc}}/profile" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>
        <div class="ln_solid"></div>

        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{$urlFunc}}/profileUpdate" method="POST" enctype="multipart/form-data">

          <div class="form-group">
            <div class="col-md-6 col-sm-6">
              <label for="name">Nome <span class="required">*</span></label>
              <span class="label label-info"> {{$data->name}}</span>
              <input type="text" id="name" required="required" name="name" class="form-control" value="{{$data->name}}">
            </div>

            <div class="col-md-6 col-sm-6">
              <label for="email">Email <span class="required">*</span></label>
              <span class="label label-info"> {{$data->email}}</span>
              <input type="email" id="email" required="required" name="email" class="form-control" value="{{$data->email}}">
            </div>
          </div>


          <div class="form-group">

            <div class="col-md-3 col-sm-3">
              <label for="cpf">CPF <span class="required">*</span></label>
              <span class="label label-info"> {{$data->cpf}}</span>
              <input type="text" id="cpf" required="required" name="cpf" class="form-control cpf_cnpj" value="{{$data->cpf}}">
            </div>

            <div class="col-md-3 col-sm-3">
              <label for="rg">RG <span class="required">*</span></label>
              <span class="label label-info"> {{$data->rg}}</span>
              <input type="text" id="rg" required="required" name="rg" class="form-control" value="{{$data->rg}}">
            </div>

            <div class="col-md-3 col-sm-3">
              <label for="fone_1">Telefone <span class="required">*</span></label>
              <span class="label label-info"> {{$data->telefone_1}}</span>
              <input type="text" id="fone_1" required="required" name="fone_1" class="form-control" value="{{$data->telefone_1}}">
            </div>

            <div class="col-md-3 col-sm-3">
              <label for="fone_2">Telefone </label>
              <span class="label label-info"> {{$data->telefone_2}}</span>
              <input type="text" id="fone_2" required="required" name="fone_2" class="form-control" value="{{$data->telefone_2}}">
            </div>

          </div>


          <div class="form-group">
            <div class="col-md-3 col-sm-3">
              <label>SEXO <span class="required">*</span></label>
              <span class="label label-info">{{$data->sexo}}</span>
              <p>
                <input type="radio" class="flat" name="sexo" id="masculino" value="Masculino" @if($data->sexo == 'Masculino')checked="" @endif required /> <label for="masculino">Masculino</label>
              </p>
              <p>
                <input type="radio" class="flat" name="sexo" id="feminino" value="Feminino" @if($data->sexo == 'Feminino')checked="" @endif required /> <label for="feminino">Feminino</label>
              </p>
            </div>

            <div class="col-md-2 col-sm-2">
              <label for="idade">Idade <span class="required">*</span></label>
              <span class="label label-info">{{$data->idade}}</span>
              <input type="text" id="idade" required="required" name="idade" class="form-control" value="{{$data->idade}}">
            </div>
          </div>

          <div class="ln_solid"></div>

          <div class="form-group">

            <div class="col-md-2 col-sm-2">
              <label for="cep">CEP <span class="required">*</span></label>
              <span class="label label-info">{{$data->cep}}</span>
              <input type="text" id="cep" required="required" name="cep" class="form-control" value="{{$data->cep}}">
            </div>

            <div class="col-md-5 col-sm-5">
              <label  for="endereco">Av/Rua/Logradouro <span class="required">*</span></label>
              <span class="label label-info">{{$data->endereco}}</span>
              <input type="text" id="endereco" required="required" name="endereco" class="form-control" value="{{$data->endereco}}">
            </div>

            <div class="col-md-2 col-sm-2">
              <label for="numero">Numero <span class="required">*</span></label>
              <span class="label label-info">{{$data->numero}}</span>
              <input type="text" id="numero" required="required" name="numero" class="form-control" value="{{$data->numero}}">
            </div>

            <div class="col-md-3 col-sm-3">
              <label for="complemento">Complemento <span class="required">*</span></label>
              <span class="label label-info">{{$data->complemento}}</span>
              <input type="text" id="complemento" required="required" name="complemento" class="form-control" value="{{$data->complemento}}">
            </div>

          </div>

          <div class="form-group">
            <div class="col-md-4 col-sm-4">
              <label for="bairro">Bairro <span class="required">*</span></label>
              <span class="label label-info">{{$data->bairro}}</span>
              <input type="text" id="bairro" required="required" name="bairro" class="form-control" value="{{$data->bairro}}">
            </div>

            <div class="col-md-4 col-sm-4">
              <label for="cidade">Cidade <span class="required">*</span></label>
              <span class="label label-info">{{$data->cidade}}</span>
              <input type="text" id="cidade" required="required" name="cidade" class="form-control" value="{{$data->cidade}}">
            </div>

            <div class="col-md-1 col-sm-1">
              <label for="uf">Estado <span class="required">*</span></label>
              <span class="label label-info">{{$data->uf}}</span>
              <input type="text" id="uf" required="required" name="uf" class="form-control" value="{{$data->uf}}">
            </div>

          </div>


          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="_method" value="put">
              <button type="submit" class="btn btn-success pull-right">Editar</button>
            </div>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>


@endsection
