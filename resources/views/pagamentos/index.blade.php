@extends('layouts.main')

@section('container')

  <div style="display:none;">

      <!-- Url  defoult-->
      {{$urlPlano = '/pagamentos'}}
      {{$srcPlano = ''}}

  </div>


  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">

        <div class="x_title">
          <h2>Listagem de Pagamentos</h2>
          <div class="clearfix"></div>
        </div>

        <div class="x_content">

          <br />
          <table id="datatable-responsive" class="table table-striped jambo_table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr class="headings">
                <th>Aluno</th>
                <th>CPF</th>
                <th>Data de Vencimanto</th>
                <th>Data de Pagamento</th>
                <th>Valor</th>
                <th>Status</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $d)
                <tr>
                  <td>{{$d->aluno->name}}</td>
                  <td>{{$d->aluno->cpf}}</td>
                  <td>{{$d->data_vencimento}}</td>
                  <td>{{$d->data_pagamento}}</td>
                  <td>{{$d->valor}}</td>
                  <td>

                    @if ($d->status == 0)


                        @if ($d->status_pagamento == 0)
                          <p class="label label-danger">
                          Atrasado <i class="fa fa-times-circle"></i>
                          </p>

                        @elseif ($d->status_pagamento == 1)
                          <p class="label label-info">
                          Aberto <i class="fa fa-check-circle"></i>
                          </p>
                        @else
                          <p class="label label-info">
                          Hoje <i class="fa fa-check-circle"></i>
                          </p>
                        @endif

                    @else
                      <p class="label label-success">
                      PAGO <i class="fa fa-check-circle"></i>
                      </p>

                    @endif
                  </td>
                  <td>

                    @if ($d->status == 0)
                      <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target=".bs-example-modal-sm-pagamento{{ $d->id }}" title="Pagar"><i class="fa fa-check"></i>Pagar</button>
                    @else
                      <h5 class="label label-success">PAGO</h5>
                    @endif

                  </td>
                </tr>


                {{--  Modal de Pagamento    --}}

                <div class="modal fade bs-example-modal-sm-pagamento{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">


                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Pagar Mensalidade</h4>
                        </div>

                        <form action="{{$urlPlano}}/{{ $d->id  }}" method="POST">
                        <div class="modal-body">
                          Realizar o Pagamento?
                        </div>
                        <div class="modal-footer">
                          <input type="hidden" name="aluno_id" value="{{$d->aluno->id}}">
                          <input type="hidden" name="_method" value="put">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">
                            <i class="fa fa-usd"></i>
                            Pagar
                          </button>

                        </div>

                        </form>

                    </div>
                  </div>
                </div>

                {{--  Modal de Pagamento--}}






              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>



@endsection
