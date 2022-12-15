<div class="sidebar" data-color="danger"  data-background-color="black" data-image="{{ asset('img/sidebar-1.jpg') }}">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="{{ route('home') }}" class="simple-text logo-normal">
      {{ __('SIGFA') }}
    </a>
  </div>
  @if(auth()->user()->role==0)
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Inicio') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i class="material-icons">settings_remote</i>
          <p>{{ __('Detectores') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse list-unstyled" id="laravelExample">
        
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'devices' ? ' active' : '' }}">
              <a class="nav-link" href="{{url('/devices')}}">
                <i class="material-icons">save</i>
                <span class="sidebar-normal">{{ __('Dispositivos') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'sensors' ? ' active' : '' }}">
              <a class="nav-link" href="{{url('/sensors')}}">
                <i class="material-icons">inbox</i>
                <span class="sidebar-normal"> {{ __('Sensores') }} </span>
              </a>
            </li>
          </ul>      
        </div>

      </li>
<!-- INICIO -->
    
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-admin') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#Admin" aria-expanded="true">
          <i class="material-icons" >perm_identity</i>
          <p>{{ __('Administracion') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse list-unstyled" id="Admin">
          <ul class="nav">


          <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
            <a class="nav-link" href="{{route('users.index')}}">
            <i class="material-icons">fingerprint</i>
              <p>{{ __('Usuarios') }}</p>
            </a>
          </li>
          <!--<li class="nav-item{{ $activePage == 'incidents' ? ' active' : '' }}">
            <a class="nav-link" href="{{route('incidents.index')}}">
            <i class="material-icons">construction</i>
              <p>{{ __('Incidentes') }}</p>
            </a>
          </li>-->
          <li class="nav-item{{ $activePage == 'categories' ? ' active' : '' }}">
            <a class="nav-link" href="{{route('categories.index')}}">
            <i class="material-icons">receipt</i>
              <p>{{ __('Categorias') }}</p>
            </a>
          </li>
          <li class="nav-item{{ $activePage == 'levels' ? ' active' : '' }}">
            <a class="nav-link" href="{{route('levels.index')}}">
            <i class="material-icons">poll</i>
              <p>{{ __('Niveles') }}</p>
            </a>
          </li>
          </ul>
        </div>
      </li>
<!-- FIN -->
<!-- INICIO -->
    
<li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-register') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#Reg" aria-expanded="true">
          <i class="material-icons" >article</i>
          <p>{{ __('Registros') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse list-unstyled" id="Reg">
          <ul class="nav">


          <li class="nav-item{{ $activePage == 'readings' ? ' active' : '' }}">
            <a class="nav-link" href="{{url('/readings')}}">
              <i class="material-icons">bubble_chart</i>
              <p>{{ __('Lecturas') }}</p>
          </a>
          </li>

          <li class="nav-item{{ $activePage == 'pipelines' ? ' active' : '' }}">
            <a class="nav-link" href="{{url('/pipelines')}}">
              <i class="material-icons">timeline</i>
              <p>{{ __('Tuberias') }}</p>
            </a>
          </li>

          </ul>
        </div>
      </li>
<!-- FIN -->

      <li class="nav-item{{ $activePage == 'panels' ? ' active' : '' }}">
        <a class="nav-link" href="{{url('/panels')}}">
          <i class="material-icons"><span class="material-icons">
slow_motion_video
</span></i>
            <p>{{ __('Panel de Control') }}</p>
        </a>
      </li>
      
      
      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{url('/notificaciones')}}">
          <i class="material-icons">notifications</i>
          <p>{{ __('Notificaciones') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
        <a class="nav-link" href="#">
          <i class="material-icons">language</i>
          <p>{{ __('Ayuda') }}</p>
        </a>
      </li>
    </ul>
  </div>
@else
<div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-admin') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#Admin" aria-expanded="true">
          <i class="material-icons" >perm_identity</i>
          <p>{{ __('Administracion') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse list-unstyled" id="Admin">
          <ul class="nav">
          
      <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
            <a class="nav-link" href="{{route('users.index')}}">
            <i class="material-icons">fingerprint</i>
              <p>{{ __('Usuarios') }}</p>
            </a>
      </li>
      <!--<li class="nav-item{{ $activePage == 'incidents' ? ' active' : '' }}">
            <a class="nav-link" href="{{route('incidents.index')}}">
            <i class="material-icons">construction</i>
              <p>{{ __('Incidentes') }}</p>
            </a>
      </li>-->
          
          </ul>
        </div>
      </li>

      
      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{url('/notificaciones')}}">
          <i class="material-icons">notifications</i>
          <p>{{ __('Notificaciones') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
        <a class="nav-link" href="#">
          <i class="material-icons">language</i>
          <p>{{ __('Ayuda') }}</p>
        </a>
      </li>
    </ul>
  </div>
@endif


</div>
