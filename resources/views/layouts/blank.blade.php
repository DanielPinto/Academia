<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gentellela Alela! | </title>

        <!-- Bootstrap -->
        <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="{{ asset("css/custom.min.css") }}" rel="stylesheet">

        @stack('stylesheets')

    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">





              <!-- top navigation -->
              <div class="top_nav">
                  <div class="nav_menu">
                      <nav>
                          <div class="nav toggle">
                              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                          </div>

                          <ul class="nav navbar-nav navbar-right">
                              <li class="">
                                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                      <img src="{{ Gravatar::src(Auth::user()->email) }}" alt="Avatar of {{ Auth::user()->name }}">
                                      {{ Auth::user()->name }}
                                      <span class=" fa fa-angle-down"></span>
                                  </a>
                                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                                      <li><a href="javascript:;"> Profile</a></li>
                                      <li>
                                          <a href="javascript:;">
                                              <span class="badge bg-red pull-right">50%</span>
                                              <span>Settings</span>
                                          </a>
                                      </li>
                                      <li><a href="javascript:;">Help</a></li>
                                      <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                  </ul>
                              </li>

                              <li role="presentation" class="dropdown">
                                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                      <i class="fa fa-envelope-o"></i>
                                      <span class="badge bg-green">6</span>
                                  </a>
                                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                      <li>
                                          <a>
                                              <span class="image"><img src="{{ Gravatar::src(Auth::user()->email) }}" alt="Profile Image" /></span>
                                              <span>
                                        <span>John Smith</span>
                                        <span class="time">3 mins ago</span>
                                      </span>
                                              <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                                          </a>
                                      </li>
                                      <li>
                                          <a>
                                              <span class="image"><img src="{{ Gravatar::src(Auth::user()->email) }}" alt="Profile Image" /></span>
                                              <span>
                                        <span>John Smith</span>
                                        <span class="time">3 mins ago</span>
                                      </span>
                                              <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                                          </a>
                                      </li>
                                      <li>
                                          <a>
                                              <span class="image"><img src="{{ Gravatar::src(Auth::user()->email) }}" alt="Profile Image" /></span>
                                              <span>
                                        <span>John Smith</span>
                                        <span class="time">3 mins ago</span>
                                      </span>
                                              <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                                          </a>
                                      </li>
                                      <li>
                                          <a>
                                              <span class="image"><img src="{{ Gravatar::src(Auth::user()->email) }}" alt="Profile Image" /></span>
                                              <span>
                                        <span>John Smith</span>
                                        <span class="time">3 mins ago</span>
                                      </span>
                                              <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                                          </a>
                                      </li>
                                      <li>
                                          <div class="text-center">
                                              <a>
                                                  <strong>See All Alerts</strong>
                                                  <i class="fa fa-angle-right"></i>
                                              </a>
                                          </div>
                                      </li>
                                  </ul>
                              </li>
                          </ul>
                      </nav>
                  </div>
              </div>
              <!-- /top navigation -->








              <div class="col-md-3 left_col">
                  <div class="left_col scroll-view">
                      <div class="navbar nav_title" style="border: 0;">
                          <a href="{{ url('/') }}" class="site_title"><i class="fa fa-paw"></i> <span>Gentellela Alela!</span></a>
                      </div>

                      <div class="clearfix"></div>

                      <!-- menu profile quick info -->
                      <div class="profile">
                          <div class="profile_pic">
                              <img src="{{ Gravatar::src(Auth::user()->email) }}" alt="Avatar of {{ Auth::user()->name }}" class="img-circle profile_img">
                          </div>
                          <div class="profile_info">
                              <span>Welcome,</span>
                              <h2>{{ Auth::user()->name }}</h2>
                          </div>
                      </div>
                      <!-- /menu profile quick info -->

                      <br />

                      <!-- sidebar menu -->
                      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                          <div class="menu_section">
                              <h3>Group 1</h3>
                              <ul class="nav side-menu">
                                  <li><a><i class="fa fa-home"></i> Multiple link <span class="fa fa-chevron-down"></span></a>
                                      <ul class="nav child_menu">
                                          <li><a href="#">Link 1</a></li>
                                          <li><a href="#">Link 2</a></li>
                                          <li><a href="#">Link 3</a></li>
                                      </ul>
                                  </li>
                                  <li>
                                      <a href="javascript:void(0)">
                                          <i class="fa fa-laptop"></i>
                                          One link
                                          <span class="label label-success pull-right">Flag</span>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                          <div class="menu_section">
                              <h3>Group 2</h3>
                              <ul class="nav side-menu">
                                  <li>
                                      <a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                                      <ul class="nav child_menu">
                                          <li>
                                              <a href="#">Level One</a>
                                              <li>
                                                  <a>Level One<span class="fa fa-chevron-down"></span></a>
                                                  <ul class="nav child_menu">
                                                      <li class="sub_menu">
                                                          <a href="#">Level Two</a>
                                                      </li>
                                                      <li>
                                                          <a href="#">Level Two</a>
                                                      </li>
                                                      <li>
                                                          <a href="#">Level Two</a>
                                                      </li>
                                                  </ul>
                                              </li>
                                          <li>
                                              <a href="#">Level One</a>
                                          </li>
                                      </ul>
                                  </li>
                              </ul>
                          </div>

                      </div>
                      <!-- /sidebar menu -->

                      <!-- /menu footer buttons -->
                      <div class="sidebar-footer hidden-small">
                          <a data-toggle="tooltip" data-placement="top" title="Settings">
                              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                          </a>
                          <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                          </a>
                          <a data-toggle="tooltip" data-placement="top" title="Lock">
                              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                          </a>
                          <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ url('/logout') }}">
                              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                          </a>
                      </div>
                      <!-- /menu footer buttons -->
                  </div>
              </div>










                @yield('container')

            </div>
        </div>

        <!-- jQuery -->
        <script src="{{ asset("js/jquery.min.js") }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset("js/bootstrap.min.js") }}"></script>
        <!-- Custom Theme Scripts -->
        <script src="{{ asset("js/custom.min.js") }}"></script>

        <script src="{{ asset("js/fastclick.js") }}"></script>

          <script src="{{ asset("js/nprogress.js") }}"></script>


        @stack('scripts')

    </body>
</html>
