<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/images/favicon.ico">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>Academia VM</title>



    <div style="display:none;">

        <!-- Url  defoult-->
        {{$urlMain = '/'}}
        {{$srcMain = '/'}}

    </div>

    <!-- include files styles css-->
    @include('includes.styles')
    <!--/ include files styles css-->

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

<!-- **********************  Navigation sideBar, TopBar, profile Info and FooterSideBar ******************************* -->
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">

            <div class="navbar nav_title" style="border: 0;">
              <a href="{{$urlMain}}" class="site_title"><i class="fa fa-star"></i> <span>Academia VM</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            @include('includes.profileInfo')
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            @include('includes.sidebar')
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            @include('includes.menuFooter')
            <!-- /menu footer buttons -->

          </div>
        </div>
  <!--/ ********************** / Navigation sideBar, profile Info and FooterSideBar ******************************* -->



      <!-- top navigation -->
        @include('includes.topMenu')
      <!-- /top navigation -->

      <div class="right_col" role="main">
        <div class="app">
        <!-- content -->
          @yield('container')
        <!-- /content -->
        </div>
      </div>

      <!-- footer content -->
        @include('includes.footer')
      <!-- /footer content -->

      </div>
    </div>

    @include('includes.scripts')

  </body>
</html>
