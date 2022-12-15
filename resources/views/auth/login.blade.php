@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'login', 'title' => __('Ingreso al Sistema de Gestion de Fugas')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-md-9 ml-auto mr-auto mb-3 text-center">
      <h3> </h3>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="card card-login card-hidden mb-3" >
          <div class="card-header card-header-secundary text-center" style="background-color:#F44336" >
            <h4 class="card-title"><strong>{{ __('Iniciar Sesión') }}</strong></h4>
            <div class="social-line">
              <a href="#" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-user-circle"></i>
              </a>
              <!--<a href="#" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-twitter"></i>
              </a>
              <a href="#">
              <img src="{{asset('/img/SIGFAv3.png')}}" alt="image" class="avatar" width="80" height="80">
              </a>-->
            </div>
          </div>
          <div class="card-body">
            <p class="card-description text-center"></p>
            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="{{ __('Email...') }}" value="{{ old('email', 'admin@admin.com') }}" required autocomplete="email" autofocus>
              </div>
              @if ($errors->has('email'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                  <strong>{{ $errors->first('email') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password...') }}" value="{{ !$errors->has('password') ? "38655155" : "" }}" required autocomplete="current-password">
              </div>
              @if ($errors->has('password'))
                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
            </div>
            <div class="form-check mr-auto ml-3 mt-3">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember me') }}
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
              </label>
            </div>
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-secundary btn-link btn-lg" style="background-color:#F44336; color:#FFFF">{{ __('Ingresar') }}</button>
          </div>
        </div>
      </form>
      <div class="row">
        <div class="col-6">
            <!--@if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-light">
                    <small>{{ __('Olvido su clave?') }}</small>
                </a>
            @endif-->
        </div>
        <!--<div class="col-6 text-right">
            <a href="{{ route('register') }}" class="text-light">
                <small>{{ __('Crear una nueva cuenta') }}</small>
            </a>
        </div>-->
      </div>
    </div>
  </div>
</div>
@endsection
