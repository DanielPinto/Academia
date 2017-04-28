@extends('layouts.main')


@section('container')

  <div style="display:none;">

      <!-- Url  defoult-->
      {{$urlFunc = '/funcionarios'}}
      {{$srcFunc = ''}}

  </div>


<div class="clearfix"></div>

    <div class="x_panel">

      <div class="x_title">
        <h2>Cadastro de Funcionário</h2>
        <div class="clearfix"></div>
      </div>


      <div class="x_content">
        <br />


        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{$urlFunc}}" method="POST" enctype="multipart/form-data">

          <div class="row">

            <div class="form-group">
              <div class="col-md-6 col-sm-6">
                <label for="name">Nome <span class="required">*</span></label>
                <input type="text" id="name" required="required" name="name" class="form-control">
              </div>

              <div class="col-md-6 col-sm-6">
                <label for="email">Email <span class="required">*</span></label>
                <input type="email" id="email" required="required" name="email" class="form-control">
              </div>
            </div>


            <div class="form-group">

              <div class="col-md-3 col-sm-3">
                <label for="cpf">CPF <span class="required">*</span></label>
                <input type="text" id="cpf" required="required" name="cpf" class="form-control cpf_cnpj">
              </div>

              <div class="col-md-3 col-sm-3">
                <label for="rg">RG <span class="required">*</span></label>
                <input type="text" id="rg" required="required" name="rg" class="form-control">
              </div>

              <div class="col-md-3 col-sm-3">
                <label for="fone_1">Telefone <span class="required">*</span></label>
                <input type="text" id="fone_1" required="required" name="fone_1" class="form-control">
              </div>

              <div class="col-md-3 col-sm-3">
                <label class="control-label col-md-3 col-sm-3" for="fone_2">Telefone</label>
                <input type="text" id="fone_2" required="required" name="fone_2" class="form-control">
              </div>

            </div>


            <div class="form-group">
              <div class="col-md-3 col-sm-3">
                <label>SEXO <span class="required">*</span></label>
                <p>
                  <input type="radio" class="flat" name="sexo" id="masculino" value="Masculino" checked="" required /> <label for="masculino">Masculino</label>
                </p>
                <p>
                  <input type="radio" class="flat" name="sexo" id="feminino" value="Feminio" checked="" required /> <label for="feminino">Feminino</label>
                </p>
              </div>

              <div class="col-md-1 col-sm-1">
                <label for="idade">Idade <span class="required">*</span></label>
                <input type="number" id="idade" required="required" name="idade" class="form-control">
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

            <div class="form-group">
              <div class="col-md-3 col-sm-3">
                <label for="data_admissao">Data Admissão <span class="required">*</span></label>
                <input type="date" id="data_admissao" required="required" name="data_admissao" class="form-control">
              </div>

              <div class="col-md-6 col-sm-6">
                <label for="funcao">Função <span class="required">*</span></label>
                <select class="select2_single form-control" tabindex="-1" name="funcao" id="funcao">
                  <option></option>
                  <option value="Administrador">Administrador</option>
                  <option value="Instrutor">Instrutor</option>

                </select>
              </div>

              <div class="col-md-3 col-sm-3">
                <label for="salario">Salario <span class="required">*</span></label>
                <input type="text" id="salario" required="required" name="salario" class="form-control">
              </div>
            </div>

            <div class="ln_solid"></div>

            <div class="form-group">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-success pull-right">Cadastrar</button>
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
