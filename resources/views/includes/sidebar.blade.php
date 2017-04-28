<div style="display:none;">

    <!-- Url  defoult-->
    {{$urlSidebar = ''}}
    {{$srcSidebar = ''}}

</div>

<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">

    @if (Auth::user()->auth == 1 )
    <h3>Administrador</h3>
  @elseif (Auth::user()->auth == 2)
    <h3>Funcionario</h3>
  @endif

    <ul class="nav side-menu">


      <li>
        <a href="{{url($urlSidebar.'/')}}"><i class="fa fa-home"></i> Home </a>

      </li>



      <!-- Menu para Funcionarios
      -->
      @if (Auth::user()->auth == 1 )

        <li><a><i class="fa fa-user"></i> Funcionários <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
              <li><a href="{{url($urlSidebar.'funcionarios/create')}}">Cadastrar</a></li>
              <li><a href="{{url($urlSidebar.'funcionarios')}}">Listar</a></li>

          </ul>
        </li>

        <li><a><i class="fa fa-briefcase"></i> Componentes <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
              <li><a href="{{url($urlSidebar.'planos')}}">Planos</a></li>
              <li><a href="{{url($urlSidebar.'treinos')}}">Treinos</a></li>
              <li><a href="{{url($urlSidebar.'exercicios')}}">Exercicios</a></li>

          </ul>
        </li>
      @endif





    </ul>
  </div>

</div>