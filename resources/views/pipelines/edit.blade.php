@extends('layouts.main',['activePage' => 'pipelines','titlePage' => 'Nueva Tuberia de Agua'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif
                <form action="{{route('pipelines.update',$pipeline->id)}}"  method="POST" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="card ">
                        <div class="card-header card-header-secundary" style="background-color:#F44336">
                            <h4 class="card-title">{{ __('Modificar Tuberia') }}</h4>
                            <p class="card-category">{{ __('Ingresar Datos') }}</p>
                        </div>
                        <div class="card body">
                            <div class="row">
                                <label for="title" class="col-sm-2 col-form-label" style="margin-left:50px" >Ubicacion</label>
                                <div class="col-sm-6">
                                    <input class="form-control" name="positiong" type="text" placeholder="Ingrese ubicacion" required="true" aria-required="true" autofocus value="{{$pipeline->positiong}}"/>
                                </div>                             
                            </div>

                            <div class="row" style="margin-top:30px">
                                <label for="country" class="col-sm-2 col-form-label" style="margin-left:50px">Pais</label>
                                    <select name="country" class="col-sm-3">
                                        <option value="S">Seleccione</option>
                                        @foreach($paises as $pais)
                                            <option value="{{ $pais }}" >{{ $pais}}</option>
                                        @endforeach
                                    </select>

                                    <label for="province" class="col-sm-2 col-form-label" style="margin-left:50px" >Provincia</label>
                                    <select name="province" class="col-sm-3">
                                        @foreach($provincias as $provincia)
                                            <option value="{{ $provincia }}">{{ $provincia}}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="row" style="margin-top:30px" >
                                <label for="location" class="col-sm-2 col-form-label" style="margin-left:50px" >Localidades</label>
                                <select name="location" class="col-sm-3">
                                        @foreach($localidades as $localidad)
                                            <option value="{{ $localidad }}">{{ $localidad}}</option>
                                        @endforeach
                                    </select>
                                
                                    <label for="neighborhood" class="col-sm-2 col-form-label" style="margin-left:50px" >Barrio</label>
                                    <select name="neighborhood" class="col-sm-3">
                                        @foreach($barrios as $barrio)
                                            <option value="{{ $barrio }}">{{ $barrio}}</option>
                                        @endforeach
                                    </select>                                                
                            </div>
                            <div class="row" style="margin-top:30px" >
                                <label for="material" class="col-sm-2 col-form-label" style="margin-left:50px" >Material</label>
                                <select name="material" class="col-sm-3">
                                        @foreach($materiales as $material)
                                            <option value="{{ $material }}">{{ $material}}</option>
                                        @endforeach
                                </select> 
                                
                                    <label for="diameter" class="col-sm-2 col-form-label" style="margin-left:50px" >Diametro(mm)</label>
                                    <div class="col-sm-3">
                                        <input class="form-control" name="diameter" type="number" placeholder="Ingrese diametro en mm" required="true" min="0" max="15000" step="0.01" aria-required="true" autofocus value="{{$pipeline->diameter}}"/>
                                    </div>                                                
                            </div>

                            <div class="row" style="margin-top:30px" >
                                <label for="thickness" class="col-sm-2 col-form-label" style="margin-left:50px" >Espesor(mm)</label>
                                <div class="col-sm-3">
                                        <input class="form-control" name="thickness" type="number" placeholder="Ingrese espesor en mm" min="0" max="15000" step="0.01" required="true" aria-required="true" autofocus value="{{$pipeline->thickness}}"/>
                                    </div>  
                                
                                    <label for="length" class="col-sm-2 col-form-label" style="margin-left:50px" >Longitud(m)</label>
                                    <div class="col-sm-3">
                                        <input class="form-control" name="length" type="number" placeholder="Ingrese longitud en m" required="true" aria-required="true" autofocus value="{{$pipeline->length}}"/>
                                    </div>                                                
                            </div>
                            <div class="row" style="margin-top:30px" >
                                <label for="depth_earth" class="col-sm-2 col-form-label" style="margin-left:50px" >Profundidad(m)</label>
                                <div class="col-sm-3">
                                        <input class="form-control" name="depth_earth" type="number" placeholder="Ingrese profundidad en m" required="true" aria-required="true" autofocus value="{{$pipeline->depth_earth}}"/>
                                    </div>  
                                
                                    <label for="type_cover" class="col-sm-2 col-form-label" style="margin-left:50px" >Cobertura</label>
                                    <select name="type_cover" class="col-sm-3">
                                        @foreach($coberturas as $cobertura)
                                            <option value="{{ $cobertura }}">{{ $cobertura}}</option>
                                        @endforeach
                                    </select>                                                
                            </div>
                            <div class="row" style="margin-top:30px" >
                                <label for="life_time" class="col-sm-2 col-form-label" style="margin-left:50px" >Tiempo de Vida(años)</label>
                                <div class="col-sm-6">
                                        <input class="form-control" name="life_time" type="number" placeholder="Ingrese tiempo de vida de la tuberia en años" required="true" aria-required="true" autofocus value="{{$pipeline->life_time}}"/>
                                    </div>                                               
                            </div>

                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-secundary" style="background-color:#F44336; color:#FFFF">{{ __('Modificar') }}</button>
                            <a  class="btn btn-secundary" style="background-color:#000000; color:#FFFF;margin-left:50px" href="{{ route('pipelines.index')}}">{{ __('Cancelar') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection