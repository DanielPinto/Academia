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
        <h2>Editar Perfil do Aluno {{$data->name}}</h2>
        <div class="clearfix"></div>
      </div>


      <div class="x_content">

        <a href="{{$urlFunc}}/{{$data->id}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>
        <div class="ln_solid"></div>

        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{$urlFunc}}/{{$data->id}}" method="POST" enctype="multipart/form-data">

          <div class="row">

            <div class="form-group">
              <div class="col-md-6 col-sm-6">
                <label for="name">Nome <span class="required">*</span></label>
                <input type="text" id="name" required="required" name="name" class="form-control" value="{{$data->name}}">
              </div>

              <div class="col-md-6 col-sm-6">
                <label for="email">Email <span class="required">*</span></label>
                <input type="email" id="email" required="required" name="email" class="form-control" value="{{$data->email}}">
              </div>
            </div>


            <div class="form-group">

              <div class="col-md-3 col-sm-3">
                <label for="cpf">CPF <span class="required">*</span></label>
                <input type="text" id="cpf" required="required" name="cpf" class="form-control cpf_cnpj" value="{{$data->cpf}}">
              </div>

              <div class="col-md-3 col-sm-3">
                <label for="rg">RG <span class="required">*</span></label>
                <input type="text" id="rg" required="required" name="rg" class="form-control" value="{{$data->rg}}">
              </div>

              <div class="col-md-3 col-sm-3">
                <label for="telefone_1">Telefone <span class="required">*</span></label>
                <input type="text" id="telefone_1" required="required" name="telefone_1" class="form-control" value="{{$data->telefone_1}}">
              </div>

              <div class="col-md-3 col-sm-3">
                <label class="control-label col-md-3 col-sm-3" for="telefone_2">Telefone</label>
                <input type="text" id="telefone_2" required="required" name="telefone_2" class="form-control" value="{{$data->telefone_2}}">
              </div>

            </div>

            <div class="ln_solid"></div>

            <div class="form-group">
              <div class="col-md-3 col-sm-3">
                <label>SEXO <span class="required">*</span></label>
                <p>
                  <input type="radio" class="flat" name="sexo" id="masculino" value="Masculino" @if($data->sexo == 'Masculino')checked="" @endif required /> <label for="masculino">Masculino</label>
                </p>
                <p>
                  <input type="radio" class="flat" name="sexo" id="feminino" value="Feminino" @if($data->sexo == 'Feminino')checked="" @endif required /> <label for="feminino">Feminino</label>
                </p>
              </div>

              <div class="col-md-2 col-sm-2">
                <label for="data_nascimento">Data de Nascimento <span class="required">*</span></label>
                <input type="date" id="data_nascimento" required="required" name="data_nascimento" class="form-control" value="{{$data->data_nascimento}}">
              </div>

              <div class="col-md-3 col-sm-3">
                <label for="profissao">Profissão <span class="required">*</span></label>
                <input type="text" id="profissao" required="required" name="profissao" class="form-control" value="{{$data->profissao}}">
              </div>

              <div class="col-md-2 col-sm-2">
                <label for="peso">Peso <span class="required">*</span></label>
                <input type="text" id="peso" required="required" name="peso" class="form-control" value="{{$data->peso}}">
              </div>

              <div class="col-md-2 col-sm-2">
                <label for="altura">Altura <span class="required">*</span></label>
                <input type="text" id="altura" required="required" name="altura" class="form-control" value="{{$data->altura}}">
              </div>

            </div>

            <div class="ln_solid"></div>

            <div class="form-group">

              <div class="col-md-2 col-sm-2">
                <label for="cep">CEP <span class="required">*</span></label>
                <input type="text" id="cep" required="required" name="cep" class="form-control" value="{{$data->cep}}">
              </div>

              <div class="col-md-5 col-sm-5">
                <label  for="endereco">Av/Rua/Logradouro <span class="required">*</span></label>
                <input type="text" id="endereco" required="required" name="endereco" class="form-control" value="{{$data->endereco}}">
              </div>

              <div class="col-md-1 col-sm-1">
                <label for="numero">Numero <span class="required">*</span></label>
                <input type="text" id="numero" required="required" name="numero" class="form-control" value="{{$data->numero}}">
              </div>

              <div class="col-md-4 col-sm-4">
                <label for="complemento">Complemento <span class="required">*</span></label>
                <input type="text" id="complemento" required="required" name="complemento" class="form-control" value="{{$data->complemento}}">
              </div>

            </div>

            <div class="form-group">
              <div class="col-md-4 col-sm-4">
                <label for="bairro">Bairro <span class="required">*</span></label>
                <input type="text" id="bairro" required="required" name="bairro" class="form-control" value="{{$data->bairro}}">
              </div>

              <div class="col-md-4 col-sm-4">
                <label for="cidade">Cidade <span class="required">*</span></label>
                <input type="text" id="cidade" required="required" name="cidade" class="form-control" value="{{$data->cidade}}">
              </div>

              <div class="col-md-1 col-sm-1">
                <label for="uf">Estado <span class="required">*</span></label>
                <input type="text" id="uf" required="required" name="uf" class="form-control" value="{{$data->uf}}">
              </div>


            </div>

            <div class="ln_solid"></div>

            <div class="form-group">

              <div class="col-md-3 col-sm-3">
                <label for="dia_pagamento">Dia Pagamento <span class="required">*</span></label>
                <select class="select2_single form-control" tabindex="-1" name="dia_pagamento" id="dia_pagamento">
                  <option value="5" @if($data->dia_pagamento == 5) selected="" @endif>5</option>
                  <option value="10" @if($data->dia_pagamento == 10) selected="" @endif>10</option>
                  <option value="15" @if($data->dia_pagamento == 15) selected="" @endif>15</option>
                  <option value="20" @if($data->dia_pagamento == 20) selected="" @endif>20</option>
                  <option value="25" @if($data->dia_pagamento == 25) selected="" @endif>25</option>
                </select>
              </div>

              <div class="col-md-3 col-sm-3">
                <label for="categoria_id">Categoria <span class="required">*</span></label>
                <select class="select2_single form-control" tabindex="-1" name="categoria_id" id="categoria_id">
                  <option></option>

                  @foreach ($categorias as $c)
                    <option value="{{$c->id}}" @if($data->categoria_id == $c->id) selected="" @endif>{{$c->categoria}}</option>
                  @endforeach

                </select>
              </div>

              <div class="col-md-3 col-sm-3">
                <label for="plano_id">Plano <span class="required">*</span></label>
                <select class="select2_single form-control" tabindex="-1" name="plano_id" id="plano_id">
                    <option></option>
                    @foreach ($planos as $p)
                      @if ($p->status == 1)
                          <option value="{{$p->id}}" @if($data->plano_id == $p->id) selected="" @endif>{{$p->name}}</option>
                      @endif
                    @endforeach
                </select>
              </div>


            </div>
            <div class="ln_solid"></div>

            <div class="form-group">
                <div class="col-md-6 col-sm-6">
                  <label for="atividade_diaria">Atividades Diaria</label>
                  <textarea name="atividade_diaria" id="atividade_diaria" rows="3" cols="80">{{$data->atividade_diaria}}</textarea>
                </div>

                <div class="col-md-6 col-sm-6">
                  <label for="historico_atividade">Histórico de Atividades</label>
                  <textarea name="historico_atividade" id="historico_atividade" rows="3" cols="80">{{$data->historico_atividade}}</textarea>
                </div>
            </div>
            <div class="ln_solid"></div>

            <div class="form-group">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="put">
                <button type="submit" class="btn btn-primary pull-right">Editar</button>
              </div>
            </div>


          </div> <!-- div Row-->

        </form>

      </div>
    </div>
  </div>
</div>


@endsection
