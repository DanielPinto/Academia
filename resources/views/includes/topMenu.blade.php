
<div style="display:none;">

    <!-- Url  defoult-->
    {{$urlTopmenu = ''}}
    {{$srcTopmenu = ''}}

</div>

<div class="top_nav">
  <div class="nav_menu">
    <nav class="" role="navigation">
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

            @if (Auth::User()->funcionario->foto == 'user.png')
              <img src="{{$srcTopmenu}}/images/profiles/{{Auth::User()->funcionario->foto}}" alt="">{{Auth::User()->name}}
            @else
              <img src="{{$srcTopmenu}}/images/profiles/{{Auth::User()->funcionario_id}}/{{Auth::User()->funcionario->foto}}" alt="">{{Auth::User()->name}}
            @endif

            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">

            <li>
              <a href="{{ url($urlTopmenu.'funcionarios/profile') }}">
                <i class="fa fa-cog pull-right"></i>Settings
              </a>
            </li>

            <li>
              <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  <i class="fa fa-sign-out pull-right"></i> Logout
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>

            </li>

          </ul>
        </li>


      </ul>
    </nav>
  </div>
</div>
