<div style="display:none;">

    <!-- Url  defoult-->
    {{$urlScripts = ''}}
    {{$srcScripts = ''}}

</div>


<!-- jQuery -->
<script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>


<!-- Bootstrap -->
<script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{asset('vendors/nprogress/nprogress.js')}}"></script>

<!-- Custom Theme Scripts -->
<script src="{{asset('build/js/custom.min.js')}}"></script>

<!-- iCheck -->
<script src="{{asset('vendors/iCheck/icheck.min.js')}}"></script>

<!-- PNotify -->
<script src="{{asset('vendors/pnotify/dist/pnotify.js')}}"></script>
<script src="{{asset('vendors/pnotify/dist/pnotify.buttons.js')}}"></script>
<script src="{{asset('vendors/pnotify/dist/pnotify.nonblock.js')}}"></script>

<!-- Mask -->
<script src="{{asset('vendors/mask/jquery.mask.min.js')}}"></script>

<!-- Select2 -->
<script src="{{asset('vendors/select2/dist/js/select2.full.min.js')}}"></script>

<!-- Valida CPF/CNPJ-->
<script src="{{asset('vendors/validaCpf/validaCpfCnpj.js')}}"></script>
<script src="{{asset('vendors/validaCpf/clickValida.js')}}"></script>

<!-- Datatables -->

<script src="{{asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>


<!--

<script>
  $(document).ready(function() {
    new PNotify({
      title: "PNotify",
      type: "info",
      text: "Welcome. Try hovering over me. You can click things behind me, because I'm non-blocking.",
      nonblock: {
          nonblock: true
      },
      addclass: 'dark',
      styling: 'bootstrap3',
      hide: false,
      before_close: function(PNotify) {
        PNotify.update({
          title: PNotify.options.title + " - Enjoy your Stay",
          before_close: null
        });


        PNotify.queueRemove();

        return false;
      }
    });

  });
</script>
 /PNotify
-->


<!-- Select2 -->
<script>
  $(document).ready(function() {
    $(".select2_single").select2({
      placeholder: "Selecione uma Função",
      allowClear: true
    });
    $(".select2_group").select2({});
    $(".select2_multiple").select2({
      maximumSelectionLength: 4,
      placeholder: "With Max Selection limit 4",
      allowClear: true
    });
  });
</script>
<!-- /Select2 -->

<!-- Custom Notification -->
<script>
  $(document).ready(function() {
    var cnt = 10;

    TabbedNotification = function(options) {
      var message = "<div id='ntf" + cnt + "' class='text alert-" + options.type + "' style='display:none'><h2><i class='fa fa-bell'></i> " + options.title +
        "</h2><div class='close'><a href='javascript:;' class='notification_close'><i class='fa fa-close'></i></a></div><p>" + options.text + "</p></div>";

      if (!document.getElementById('custom_notifications')) {
        alert('doesnt exists');
      } else {
        $('#custom_notifications ul.notifications').append("<li><a id='ntlink" + cnt + "' class='alert-" + options.type + "' href='#ntf" + cnt + "'><i class='fa fa-bell animated shake'></i></a></li>");
        $('#custom_notifications #notif-group').append(message);
        cnt++;
        CustomTabs(options);
      }
    };

    CustomTabs = function(options) {
      $('.tabbed_notifications > div').hide();
      $('.tabbed_notifications > div:first-of-type').show();
      $('#custom_notifications').removeClass('dsp_none');
      $('.notifications a').click(function(e) {
        e.preventDefault();
        var $this = $(this),
          tabbed_notifications = '#' + $this.parents('.notifications').data('tabbed_notifications'),
          others = $this.closest('li').siblings().children('a'),
          target = $this.attr('href');
        others.removeClass('active');
        $this.addClass('active');
        $(tabbed_notifications).children('div').hide();
        $(target).show();
      });
    };

    CustomTabs();

    var tabid = idname = '';

    $(document).on('click', '.notification_close', function(e) {
      idname = $(this).parent().parent().attr("id");
      tabid = idname.substr(-2);
      $('#ntf' + tabid).remove();
      $('#ntlink' + tabid).parent().remove();
      $('.notifications a').first().addClass('active');
      $('#notif-group div').first().css('display', 'block');
    });
  });
</script>

<!-- /Custom Notification-->

@if (isset($data->message))

<script type="text/javascript">
new PNotify({
                title: '{!!$data->message['title']!!}',
                text: '{!!$data->message['text']!!}',
                type: '{!!$data->message['type']!!}',
                hide: true,
                styling: 'bootstrap3',
                //addclass: 'danger'
            });
</script>
@endif


<!--   Mascaras para os campos-->
<script type="text/javascript">

$(document).ready(function(){
    $('#fone_1').mask('(00) #0000-0000');
    $('#fone_2').mask('(00) #0000-0000');
    $('#rg').mask('0000000000');
    $('#cpf').mask('000.000.000-00');
    $('#salario').mask('####0.00', {reverse: true});
    $('#cep').mask('00000-000', {reverse: true});
    $('#numero').mask('000000');
    $('#idade').mask('000');
    $('#valor').mask('####0.00', {reverse: true});
    $('#valorAdd').mask('####0.00', {reverse: true});


});
</script>



<!-- Busca o endereço pelo CEP-->
<script>
// Registra o evento blur do campo "cep", ou seja, quando o usuário sair do campo "cep" faremos a consulta dos dados

$("#cep").blur(function(){

    // Para fazer a consulta, removemos tudo o que não é número do valor informado pelo usuário

    var cep = this.value.replace(/[^0-9]/, "");
    // Validação do CEP; caso o CEP não possua 8 números, então cancela a consulta

    if(cep.length!=8){

    return false;

    }

    // Utilizamos o webservice "viacep.com.br" para buscar as informações do CEP fornecido pelo usuário.

    // A url consiste no endereço do webservice ("http://viacep.com.br/ws/"), mais o cep que o usuário

    // informou e também o tipo de retorno que desejamos, podendo ser "xml", "piped", "querty" ou o que

    // iremos utilizar, que é "json"

    var url = "http://viacep.com.br/ws/"+cep+"/json/";

    // Aqui fazemos uma requisição ajax ao webservice, tratando o retorno com try/catch para que caso ocorra algum

    // erro (o cep pode não existir, por exemplo) o usuário não seja afetado, assim ele pode continuar preenchendo os campos

    $.getJSON(url, function(dadosRetorno){

        try{

              // Insere os dados em cada campo

              $("#endereco").val(dadosRetorno.logradouro);

              $("#bairro").val(dadosRetorno.bairro);

              $("#cidade").val(dadosRetorno.localidade);

              $("#uf").val(dadosRetorno.uf);

        }catch(ex){

        }

  });
});
</script>
<!-- Datatables -->
<script>
  $(document).ready(function() {
    var handleDataTableButtons = function() {
      if ($("#datatable-buttons").length) {
        $("#datatable-buttons").DataTable({
          dom: "Bfrtip",
          buttons: [
            {
              extend: "copy",
              className: "btn-sm"
            },
            {
              extend: "csv",
              className: "btn-sm"
            },
            {
              extend: "excel",
              className: "btn-sm"
            },
            {
              extend: "pdfHtml5",
              className: "btn-sm"
            },
            {
              extend: "print",
              className: "btn-sm"
            },
          ],
          responsive: true
        });
      }
    };

    TableManageButtons = function() {
      "use strict";
      return {
        init: function() {
          handleDataTableButtons();
        }
      };
    }();

    $('#datatable').dataTable();
    $('#datatable-keytable').DataTable({
      keys: true
    });

    $('#datatable-responsive').DataTable({
      language:{
                sEmptyTable: "Nenhum registro encontrado",
                sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
                sInfoFiltered: "(Filtrados de _MAX_ registros)",
                sInfoPostFix: "",
                sInfoThousands: ".",
                sLengthMenu: "_MENU_ resultados por página",
                sLoadingRecords: "Carregando...",
                sProcessing: "Processando...",
                sZeroRecords: "Nenhum registro encontrado",
                sSearch: "Pesquisar",
                oPaginate: {
                    sNext: "Próximo",
                    sPrevious: "Anterior",
                    sFirst: "Primeiro",
                    sLast: "Último"
                },
                oAria: {
                sSortAscending: ": Ordenar colunas de forma ascendente",
                sSortDescending: ": Ordenar colunas de forma descendente"
              }
            }
          });

    $('#datatable-scroller').DataTable({
      ajax: "js/datatables/json/scroller-demo.json",
      deferRender: true,
      scrollY: 380,
      scrollCollapse: true,
      scroller: true
    });

    var table = $('#datatable-fixed-header').DataTable({
      fixedHeader: true
    });

    TableManageButtons.init();
  });
</script>
<!-- /Datatables -->
