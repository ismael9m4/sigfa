@extends('layouts.main',['activePage' => 'users','titlePage' => 'Modificar usuario'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('users.update',$user->id)}}"  method="POST" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="card ">
                        <div class="card-header card-header-secundary" style="background-color:#F44336">
                            <h4 class="card-title">{{ __('Usuario') }}</h4>
                            <p class="card-category">{{ __('Modificar Datos') }}</p>
                        </div>
                        <div class="card body">
                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label" style="margin-left:50px" >Apellido y Nombre</label>
                                <div class="col-sm-3">
                                    <input class="form-control" name="name" type="text" placeholder="Ingrese su nombre" required="true" value="{{$user->name}}" aria-required="true" autofocus/>
                                </div>
                                
                                <label class="col-sm-2 col-form-label">{{ __('Nombre de Usuario') }}</label>
                                <div class="col-sm-3">
                                    <input class="form-control" name="username" type="text" placeholder="{{ __('Ingrese Usuario') }}"  value="{{$user->username}}" required autofocus/>
                                </div>                             
                            </div>
                            <div class="row" style="margin-top:30px" >
                                <label for="email" class="col-sm-2 col-form-label" style="margin-left:50px" >Email</label>
                                <div class="col-sm-3">
                                    <input class="form-control" name="email" type="email" placeholder="Ingrese su email" value="{{$user->email}}" required="true" aria-required="true" autofocus/>
                                </div>
                                
                                <label class="col-sm-2 col-form-label">{{ __('Contraseña: ') }}<em>Ingresar Solo si se desea modificar contraseña</em></label>
                                <div class="col-sm-3">
                                    <input class="form-control" name="password" id="input-password" type="password" placeholder="{{ __('Opcional') }}" value=""  autofocus/>
                                </div>                        
                            </div>
                            <div class="row" style="margin-top:30px">
                                <label for="name" class="col-sm-2 col-form-label" style="margin-left:50px" >Rol de Usuario</label>      
                                    <select name="role" class="col-sm-3">
                                        @if($user->role == '0')
                                        <option value="1" >Soporte Técnico</option>
                                        <option value="0" selected="selected">Administrador</option>
                                        @else
                                        <option value="0" >Administrador</option>
                                        <option value="1" selected="selected">Soporte Técnico</option>
                                        @endif
                                    </select>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-secundary" style="background-color:#F44336; color:#FFFF">{{ __('Guardar') }}</button>
                            <a  class="btn btn-secundary" style="background-color:#000000; color:#FFFF;margin-left:50px" href="{{ route('users.index')}}">{{ __('Cancelar') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection