<div class="col-md-12">

<table id="datatable-responsive" class="table table-striped jambo_table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
<thead>
  <tr class="headings">
    <th>Nome</th>
    <th>Status</th>
    <th>Ações</th>
  </tr>
</thead>
<tbody>
  @foreach ($data as $d)
    <tr>
      <td>{{$d->name}}</td>
      <td>
        @if ($d->status == 0)
          Desativado <i class="fa fa-times-circle"></i>

        @else
          Ativado <i class="fa fa-check-circle"></i>
        @endif
      </td>
      <td>

        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".bs-example-modal-sm-editar-{{$d->id}}" title="Editar"><i class="fa fa-edit"></i></button>

        @if ($d->status == 0)
          <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target=".bs-example-modal-sm-status-{{$d->id}}" title="Ativar"><i class="fa fa-check"></i></button>
        @else
          <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".bs-example-modal-sm-status-{{$d->id}}" title="Desativar"><i class="fa fa-remove"></i></button>
        @endif

      </td>
    </tr>



    <!-- Modal Editar-->

    <div class="modal fade bs-example-modal-sm-editar-{{$d->id}}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <form class="" action="{{$urlPlano}}/{{$d->id}}" method="POST" enctype="multipart/form-data">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel2">Editar o Treino</h4>
            </div>
            <div class="modal-body">


                <div class="form-group">
                  <label for="name">Nome do Treino</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{$d->name}}" required>
                </div>


            </div>
            <div class="modal-footer">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="hidden" name="_method" value="put">
              <button type="submit" class="btn btn-primary">Editar</button>
            </div>
          </form>
        </div>
      </div>
    </div>



    <!-- Modal Status-->

    <div class="modal fade bs-example-modal-sm-status-{{$d->id}}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <form class="" action="{{$urlPlano}}/status/{{$d->id}}" method="POST" enctype="multipart/form-data">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>

              <h4 class="modal-title" id="myModalLabel2">Status do Treino</h4>
            </div>

            <div class="modal-body">
                @if ($d->status == 0)
                  Deseja Ativar o Treino?
                @else
                  Deseja Desativar o Treino?
                @endif

            </div>

            <div class="modal-footer">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="hidden" name="status" value="">
              <input type="hidden" name="_method" value="put">
              <button type="submit" class="btn btn-primary">
                @if ($d->status == 0)
                  Ativar
                @else
                  Desativar
                @endif

              </button>
            </div>
          </form>
        </div>
      </div>
    </div>



  @endforeach

</tbody>
</table>

</div>
