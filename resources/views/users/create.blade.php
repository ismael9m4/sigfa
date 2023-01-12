@extends('layouts.main',['activePage' => 'users','titlePage' => 'Nuevo usuario'])
@section('content')
<div class="content">
    <div class="">
        <div class="">
            <div class="">
                <form method="post" action="{{route('users.store')}}"  class="formulario" id="formulario">
                    @csrf
                    <div class="card ">
                        <div class="card-header card-header-secundary" style="background-color:#F44336">
                            <h4 class="card-title">{{ __('Usuario') }}</h4>
                            <p class="card-category">{{ __('Ingresar Datos') }}</p>
                        </div>
                        <div class="row" style="margin-top:10px; margin-left:40px">
                            <div class="col-xs-12 col-md-6" style="text-align:center"> 
                                <!-- Grupo: Usuario -->
			                        <div class="formulario__grupo" id="grupo__usuario">
				                        <label for="username" class="formulario__label" style="font-weight: 700; color:black; width:100%">Usuario</label>
				                        <div class="formulario__grupo-input">
					                        <input  type="text" class="formulario__input" name="username" id="username" placeholder="john123">
					                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
				                        </div>
				                        <p class="formulario__input-error" style="display:none">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
			                        </div>
                            </div>
                            <div class="col-xs-12 col-md-6" style="text-align:center"> 
                                <!-- Grupo: Nombre -->
			                        <div class="formulario__grupo" id="grupo__nombre">
				                        <label for="name" class="formulario__label" style="font-weight: 700; color:black" >Apellido y Nombre</label>
				                        <div class="formulario__grupo-input">
					                        <input type="text" class="formulario__input" name="name" id="name" placeholder="John Doe">
					                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
				                        </div>
				                        <p class="formulario__input-error" style="display:none">El apellido y nombre tiene que ser de 4 a 16 dígitos y solo puede contener letras y espacio.</p>
			                        </div>
                            </div>  
                        </div>        
                        <div class="row" style="margin-top:10px; margin-left:40px">
                            <div class="col-xs-12 col-md-6" style="text-align:center"> 
                                <!-- Grupo: Contraseña -->
			                        <div class="formulario__grupo" id="grupo__password">
				                        <label for="password" class="formulario__label" style="font-weight: 700; color:black">Contraseña</label>
				                        <div class="formulario__grupo-input">
					                        <input type="password" class="formulario__input" name="password" id="password">
					                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
				                        </div>
				                        <p class="formulario__input-error" style="display:none">La contraseña tiene que ser de 4 a 12 dígitos.</p>
			                        </div>
                            </div>
                            <div class="col-xs-12 col-md-6" style="text-align:center"> 
                                <!-- Grupo: Contraseña 2 -->
			                        <div class="formulario__grupo" id="grupo__password2">
				                        <label for="password2" class="formulario__label" style="font-weight: 700; color:black">Repetir Contraseña</label>
				                        <div class="formulario__grupo-input">
					                        <input type="password" class="formulario__input" name="password2" id="password2">
					                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
				                        </div>
				                        <p class="formulario__input-error" style="display:none">Ambas contraseñas deben ser iguales.</p>
			                        </div>
                            </div>  
                        </div> 
                        <div class="row" style="margin-top:10px; margin-left:40px">
                            <div class="col-xs-12 col-md-6" style="text-align:center"> 
                                <!-- Grupo: Correo Electronico -->
			                        <div class="formulario__grupo" id="grupo__correo">
				                        <label for="email" class="formulario__label" style="font-weight: 700; color:black">Correo Electrónico</label>
				                        <div class="formulario__grupo-input">
					                        <input type="email" class="formulario__input" name="email" id="email" placeholder="correo@correo.com">
					                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
				                        </div>
				                        <p class="formulario__input-error" style="display:none">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
			                        </div>
                            </div>
                            <div class="col-xs-12 col-md-6" style="text-align:center"> 
                                <!-- Grupo: Tipo de Usuario -->
                                <label for="name" class="formulario__label" style="font-weight: 700; color:black" >Rol de Usuario</label>  
                                <div class="formulario__grupo-input">
                                    <select name="role" class="col-sm-5">
                                        <option value="1" >Soporte Técnico</option>
                                        <option value="0" selected="selected">Administrador</option>
                                    </select>
                                </div>    
                                    
                            </div>  
                        </div> 

                        <div class="row" style="margin-top:50px">
                        <div class="formulario__mensaje" id="formulario__mensaje" style="text-align:center">
				            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
			            </div> 
                        </div>
                        

            
                        <div class="card-footer ml-auto mr-auto" >
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