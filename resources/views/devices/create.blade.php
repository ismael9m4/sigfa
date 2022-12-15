@extends('layouts.main',['activePage' => 'devices','titlePage' => 'Nuevo Dispositivo'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{route('devices.store')}}"  class="form-horizontal">
                    @csrf
                    <div class="card ">
                        <div class="card-header card-header-secundary" style="background-color:#F44336">
                            <h4 class="card-title">{{ __('Dispositivo') }}</h4>
                            <p class="card-category">{{ __('Ingresar Datos') }}</p>
                        </div>
                        <div class="card body">
                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label" style="margin-left:50px" >Identificador</label>
                                <div class="col-sm-3">
                                    <input class="form-control" name="id" type="number" placeholder="Ingrese N° de identificacion" required="true" aria-required="true"  autofocus/>
                                </div>
                                
                                <label class="col-sm-2 col-form-label">{{ __('Numero de Serie') }}</label>
                                <div class="col-sm-3">
                                    <input class="form-control" name="serie" type="text" placeholder="{{ __('Ingrese N° de serie') }}"  required autofocus/>
                                </div>                             
                            </div>
                            <div class="row" style="margin-top:30px">
                                <label for="fk_pipeline" class="col-sm-2 col-form-label" style="margin-left:50px" >Tuberia</label>
                                    <select name="fk_pipeline" class="col-sm-6">
                                        @foreach($tuberias as $tuberia)
                                            <option value="{{ $tuberia->id }}">{{ $tuberia->id}}-{{ $tuberia->neighborhood}} : {{ $tuberia->district}}</option>
                                        @endforeach
                                    </select>                                                
                            </div>

                            <div class="row" style="margin-top:30px" >
                                <label for="email" class="col-sm-2 col-form-label" style="margin-left:50px" >Detalles</label>
                                <div class="col-sm-6">
                                    <textarea  name="details" class="form-control"  placeholder="Ingrese Descripcion" rows="4">{{old('details')}}</textarea>    
                                </div>
                                
                                            
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-secundary" style="background-color:#F44336; color:#FFFF">{{ __('Guardar') }}</button>
                            <a  class="btn btn-secundary" style="background-color:#000000; color:#FFFF;margin-left:50px" href="{{ route('devices.index')}}">{{ __('Cancelar') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection