@extends('layouts.main',['activePage' => 'sensors','titlePage' => 'Modificar Sensor'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form  action="{{route('sensors.update',$sensor->id)}}"  method="POST" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="card ">
                        <div class="card-header card-header-secundary" style="background-color:#F44336">
                            <h4 class="card-title">{{ __('Sensores') }}</h4>
                            <p class="card-category">{{ __('Modificar Datos') }}</p>
                        </div>
                        <div class="card body">
                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label" style="margin-left:50px" >Estado</label>
                                <div class="col-sm-3">
                                    <input class="form-control" name="state" type="text" placeholder="Ej: Funcionando, Detenido" required="true" value="{{$sensor->state}}"  aria-required="true" autofocus/>
                                </div>
                                
                                <label class="col-sm-2 col-form-label">{{ __('Condicion del Sensor') }}</label>
                                <div class="col-sm-3">
                                    <input class="form-control" name="condition_sensor" type="text" placeholder="{{ __('Ej: En revision, reparado') }}" value="{{$sensor->condition_sensor}}"  required autofocus/>
                                </div>                             
                            </div>
                            <div class="row" style="margin-top:30px" >
                                <label for="email" class="col-sm-2 col-form-label" style="margin-left:50px" >Tipo</label>
                                <div class="col-sm-3">
                                    <input class="form-control" name="type" type="text" placeholder="Ej: Caudalimetro,Barometrico, Regulador de Valvula " required="true" value="{{$sensor->type}}"  aria-required="true" autofocus/>
                                </div>
                                
                                <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                                <div class="col-sm-3">
                                    <input class="form-control" name="description" id="input-password" type="text" placeholder="{{ __('(Opcional)') }}" value="{{$sensor->description}}"  required autofocus/>
                                </div>                        
                            </div>
                            <div class="row" style="margin-top:30px" >
                                <label for="fk_device" class="col-sm-2 col-form-label" style="margin-left:50px" >Dispositivo</label>
                                <div class="col-sm-3">
                                <select id="fk_device" name="fk_device" class="form-control">
                                            <option value="">-- Seleccione un dispositivo    
                                            </option>
                                        @foreach($devices as $device)
                                            <option value="{{ $device['id'] }}">
                                                {{ $device['serie']  }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>                   
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-secundary" style="background-color:#F44336; color:#FFFF">{{ __('Guardar') }}</button>
                            <a  class="btn btn-secundary" style="background-color:#000000; color:#FFFF;margin-left:50px" href="{{ route('sensors.index')}}">{{ __('Cancelar') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection