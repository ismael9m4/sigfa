@extends('layouts.main',['activePage' => 'leakages','titlePage' => 'Nuevo Registro de Fuga'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{route('leakages.store')}}"  class="formulario" id="formulario">
                    @csrf
                    <div class="card ">
                        <div class="card-header card-header-secundary" style="background-color:#F44336">
                            <h4 class="card-title">{{ __('Fugas') }}</h4>
                            <p class="card-category">{{ __('Ingresar Datos') }}</p>
                        </div>
                        <div class="card body">
                            <div class="row">
                                <div class="row" style="margin-top:30px" >
                                    <label for="fk_category" class="col-sm-2 col-form-label" style="margin-left:50px" >Categoria</label>
                                    <div class="col-sm-3">
                                    <select id="fk_category" name="fk_category" class="form-control">
                                            <option value="">-- Seleccione una categoria    
                                            </option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category['id'] }}">
                                                {{ $category['name']  }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <label class="col-sm-2 col-form-label">{{ __('Perdida Estimada de la Fuga') }}</label>
                                <div class="col-sm-3">
                                    <input class="form-control" name="stimad_less" type="text" placeholder="{{ __('Ej: 4500L') }}"  required autofocus/>
                                </div>                    
                            </div>
                                                            
                            </div>
                            <div class="row" style="margin-top:30px" >
                                <label for="email" class="col-sm-2 col-form-label" style="margin-left:50px" >Fecha</label>
                                <div class="col-sm-3">
                                    <input class="form-control" name="datetime" type="text" placeholder="2018-20-11 " required="true" aria-required="true" autofocus/>
                                </div>
                                
                                <label class="col-sm-2 col-form-label">{{ __('Causa') }}</label>
                                <div class="col-sm-3">
                                    <input class="form-control" name="cause" id="input-password" type="text" placeholder="{{ __('(Obligatorio)') }}"  required autofocus/>
                                </div>                        
                            </div>
                            <div class="row" style="margin-top:30px">
                                <label for="name" class="col-sm-2 col-form-label" style="margin-left:50px" >Detalles</label>
                                <div class="col-sm-3">
                                    <input class="form-control" name="details" type="text" placeholder="Ej: Lugar, Condicion" required="true" aria-required="true" autofocus/>
                                </div>
                                
                                <label for="fk_pipeline" class="col-sm-2 col-form-label" >Tuberia </label>
                                <div class="col-sm-3">
                                <select id="fk_pipeline" name="fk_pipeline" class="form-control">
                                            <option value="">-- Seleccione una ubicacion de Tuberia    
                                            </option>
                                        @foreach($pipelines as $pipeline)
                                            <option value="{{ $pipeline['id'] }}">
                                                {{ $pipeline['district']  }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>                         
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-secundary" style="background-color:#F44336; color:#FFFF">{{ __('Guardar') }}</button>
                            <a  class="btn btn-secundary" style="background-color:#000000; color:#FFFF;margin-left:50px" href="{{ route('leakages.index')}}">{{ __('Cancelar') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection