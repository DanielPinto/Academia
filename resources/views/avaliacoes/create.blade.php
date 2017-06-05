@extends('layouts.main')


@section('container')

  <div style="display:none;">

      <!-- Url  defoult-->
      {{$urlFunc = '/avaliacoes'}}
      {{$urlAlunos='/alunos'}}
      {{$srcFunc = ''}}

  </div>


<div class="clearfix"></div>

    <div class="x_panel">

      <div class="x_title">
        <h2>Cadastro de Avaliação para o Aluno {{$aluno->name}}</h2>
        <div class="clearfix"></div>
      </div>


      <div class="x_content">
        <br />


        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{$urlFunc}}" method="POST" enctype="multipart/form-data">

          <div class="row">



            <div class="form-group">

              
              <div class="col-md-3 col-sm-3">
                <label class="control-label col-md-3 col-sm-3" for="fone_2">Telefone</label>
                <input type="text" id="fone_2" required="required" name="fone_2" class="form-control">
              </div>

            </div>

            <div class="ln_solid"></div>

            <div class="form-group">
              <div class="col-md-3 col-sm-3">
                <label>SEXO <span class="required">*</span></label>
                <p>
                  <input type="radio" class="flat" name="sexo" id="masculino" value="Masculino" checked="" required /> <label for="masculino">Masculino</label>
                </p>
                <p>
                  <input type="radio" class="flat" name="sexo" id="feminino" value="Feminino" checked="" required /> <label for="feminino">Feminino</label>
                </p>
              </div>

              <div class="col-md-2 col-sm-2">
                <label for="data_nascimento">Data de Nascimento <span class="required">*</span></label>
                <input type="date" id="data_nascimento" required="required" name="data_nascimento" class="form-control">
              </div>

              <div class="col-md-3 col-sm-3">
                <label for="profissao">Profissão <span class="required">*</span></label>
                <input type="text" id="profissao" required="required" name="profissao" class="form-control">
              </div>

              <div class="col-md-2 col-sm-2">
                <label for="peso">Peso <span class="required">*</span></label>
                <input type="text" id="peso" required="required" name="peso" class="form-control">
              </div>

              <div class="col-md-2 col-sm-2">
                <label for="altura">Altura <span class="required">*</span></label>
                <input type="text" id="altura" required="required" name="altura" class="form-control">
              </div>

            </div>

            <div class="ln_solid"></div>

            <div class="form-group">

              <div class="col-md-2 col-sm-2">
                <label for="cep">CEP <span class="required">*</span></label>
                <input type="text" id="cep" required="required" name="cep" class="form-control">
              </div>

              <div class="col-md-5 col-sm-5">
                <label  for="endereco">Av/Rua/Logradouro <span class="required">*</span></label>
                <input type="text" id="endereco" required="required" name="endereco" class="form-control">
              </div>

              <div class="col-md-1 col-sm-1">
                <label for="numero">Numero <span class="required">*</span></label>
                <input type="text" id="numero" required="required" name="numero" class="form-control">
              </div>

              <div class="col-md-4 col-sm-4">
                <label for="complemento">Complemento <span class="required">*</span></label>
                <input type="text" id="complemento" required="required" name="complemento" class="form-control">
              </div>

            </div>

            <div class="form-group">
              <div class="col-md-4 col-sm-4">
                <label for="bairro">Bairro <span class="required">*</span></label>
                <input type="text" id="bairro" required="required" name="bairro" class="form-control">
              </div>

              <div class="col-md-4 col-sm-4">
                <label for="cidade">Cidade <span class="required">*</span></label>
                <input type="text" id="cidade" required="required" name="cidade" class="form-control">
              </div>

              <div class="col-md-1 col-sm-1">
                <label for="uf">Estado <span class="required">*</span></label>
                <input type="text" id="uf" required="required" name="uf" class="form-control">
              </div>


            </div>

            <div class="ln_solid"></div>

            <div class="form-group">

              <div class="col-md-3 col-sm-3">
                <label for="dia_pagamento">Dia Pagamento <span class="required">*</span></label>
                <select class="select2_single form-control" tabindex="-1" name="dia_pagamento" id="dia_pagamento">
                  <option value="5">5</option>
                  <option value="10">10</option>
                  <option value="15">15</option>
                  <option value="20">20</option>
                  <option value="25">25</option>
                </select>
              </div>

              <div class="col-md-3 col-sm-3">
                <label for="categoria_id">Categoria <span class="required">*</span></label>
                <select class="select2_single form-control" tabindex="-1" name="categoria_id" id="categoria_id">
                  <option></option>

                  @foreach ($categorias as $c)
                    <option value="{{$c->id}}">{{$c->categoria}}</option>
                  @endforeach

                </select>
              </div>

              <div class="col-md-3 col-sm-3">
                <label for="plano_id">Plano <span class="required">*</span></label>
                <select class="select2_single form-control" tabindex="-1" name="plano_id" id="plano_id">
                    <option></option>
                    @foreach ($planos as $p)
                      @if ($p->status == 1)
                          <option value="{{$p->id}}">{{$p->name}}</option>
                      @endif
                    @endforeach
                </select>
              </div>


            </div>
            <div class="ln_solid"></div>

            <div class="form-group">
                <div class="col-md-6 col-sm-6">
                  <label for="atividade_diaria">Atividades Diaria</label>
                  <textarea name="atividade_diaria" id="atividade_diaria" rows="3" cols="80"></textarea>
                </div>

                <div class="col-md-6 col-sm-6">
                  <label for="historico_atividade">Histórico de Atividades</label>
                  <textarea name="historico_atividade" id="historico_atividade" rows="3" cols="80"></textarea>
                </div>
            </div>
            <div class="ln_solid"></div>

            <div class="form-group">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-primary pull-right">Cadastrar</button>
              </div>
            </div>


          </div> <!-- div Row-->
        </form>

      </div>
    </div>


      <style>

           .invalido {
               border: 1px solid #ffbb33;
           }
           </style>
@endsection
