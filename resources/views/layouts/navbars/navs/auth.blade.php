<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="#">{{ __('Bienvenido!!') }}</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
    <span class="sr-only">Toggle navigation</span>
    <span class="navbar-toggler-icon icon-bar"></span>
    <span class="navbar-toggler-icon icon-bar"></span>
    <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <form class="navbar-form">
        
      </form>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('reporte.pdf') }}" target="_blank" title="Descargar Informe">
            <i class="material-icons">download</i>
            <p class="d-lg-none d-md-block">
              {{ __('Descargar Reporte') }}
            </p>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" title="Notificaciones" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">notifications</i>
            <span class="notification">
              @if (count(auth()->user()->unreadNotifications)){
                <span >{{ count(auth()->user()->unreadNotifications) }}</span>
              @endif
            </span>
            <p class="d-lg-none d-md-block">
              {{ __('Notificaciones') }}
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            @forelse(auth()->user()->unreadNotifications as $notification)
            <a class="dropdown-item" href="#">
              <i class="material-icons" style="margin-right:15px">mail</i>{{$notification->data['title']}}
              <span class="col-sm-2  text-right">{{$notification->created_at->diffForHumans()}}</span>
            </a>
            @empty
            <span class="ml-3 pull-center text-muted text-sm" >Sin novedades</span>
            @endforelse
            <div class="dropdown-divider" ></div>
              <div style="text-align:center">
                <a href="{{route('markAsRead')}}" class="dropdown-item dropdown-footer" style="background-color:#000000; color:#FFFF">Marcar como leidas</a>
              </div>
          </div>

          
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#pablo" id="navbarDropdownProfile" title="Mi cuenta" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">person</i>
            <p class="d-lg-none d-md-block">
              {{ __('Mi Cuenta') }}
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right"   aria-labelledby="navbarDropdownProfile">
            <a class="dropdown-item" onmouseover="this.style.backgroundColor='#FF0000'" onmouseout="this.style.color='#000000';this.style.backgroundColor='#ffffff'" href="{{ route('users.show',auth()->user()->id)}}" >{{ __('Mi Perfil') }}</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" onmouseover="this.style.backgroundColor='#FF0000'" onmouseout="this.style.color='#000000';this.style.backgroundColor='#ffffff'"  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Cerrar Sesion') }}</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
