<!-- Bootstrap -->
<link href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
<!-- Font Awesome -->
<link href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

<!-- Custom Theme Style -->
<link href="{{asset('build/css/custom.min.css')}}" rel="stylesheet">

<!-- PNotify -->
<link href="{{asset('vendors/pnotify/dist/pnotify.css')}}" rel="stylesheet">
<link href="{{asset('vendors/pnotify/dist/pnotify.buttons.css')}}" rel="stylesheet">
<link href="{{asset('vendors/pnotify/dist/pnotify.nonblock.css')}}" rel="stylesheet">


<!-- iCheck -->
<link href="{{asset('vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
<!-- bootstrap-wysiwyg -->
<link href="{{asset('vendors/google-code-prettify/bin/prettify.min.css')}}" rel="stylesheet">
<!-- Select2 -->
<link href="{{asset('vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
<!-- Switchery -->
<link href="{{asset('vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet">
<!-- starrr -->
<link href="{{asset('vendors/starrr/dist/starrr.css')}}" rel="stylesheet">

<!-- Datatables -->
<link href="{{asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">



<!-- Scripts
OBS: este script é incluso nos styles pois deve ficar head do documento
-->

<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>
