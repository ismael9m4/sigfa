@extends('layouts.main',['activePage' => 'levels','titlePage' => 'Nuevo Nivel'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{route('levels.store')}}"  class="form-horizontal">
                    @csrf
                    <div class="card ">
                        <div class="card-header card-header-secundary" style="background-color:#F44336">
                            <h4 class="card-title">{{ __('Nivel de Atencion') }}</h4>
                            <p class="card-category">{{ __('Ingresar Datos') }}</p>
                        </div>
                        <div class="card body">
                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label" style="margin-left:50px" >Nombre del Nivel</label>
                                <div class="col-sm-3">
                                    <input class="form-control" name="id" type="text" placeholder="Ingrese Nombre del Nivel" required="true" aria-required="true" autofocus/>
                                </div>
                                
                                <label class="col-sm-2 col-form-label">{{ __('Descripcion del Nivel') }}</label>
                                <div class="col-sm-3">
                                    <input class="form-control" name="serie" type="text" placeholder="{{ __('Ingrese una descripcion') }}"  required autofocus/>
                                </div>                             
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-secundary" style="background-color:#F44336; color:#FFFF">{{ __('Guardar') }}</button>
                            <a  class="btn btn-secundary" style="background-color:#000000; color:#FFFF;margin-left:50px" href="{{ route('levels.index')}}">{{ __('Cancelar') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection