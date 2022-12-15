@extends('layouts.main',['activePage' => 'categories','titlePage' => 'Nueva Categoria'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <form  action="{{route('categories.update',$category->id)}}"  method="POST" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="card ">
                        <div class="card-header card-header-secundary" style="background-color:#F44336">
                            <h4 class="card-title">{{ __('Categoria') }}</h4>
                            <p class="card-category">{{ __('Modificar Datos') }}</p>
                        </div>
                        <div class="card body">
                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label" style="margin-left:50px" >Nombre de Categoria</label>
                                <div class="col-sm-3">
                                    <input class="form-control" name="name" type="text" placeholder="Ingrese Nombre de la Categoria" required="true" aria-required="true" value="{{$category->name}}" autofocus/>
                                </div>                            
                            </div>

                            <div class="row" style="margin-top:30px" >
                                <label for="email" class="col-sm-2 col-form-label" style="margin-left:50px" >Descripcion</label>
                                <div class="col-sm-6">
                                    <textarea  name="details" class="form-control"  placeholder="Ingrese Descripcion" rows="4">{{$category->details}}</textarea>    
                                </div>
                                
                                            
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-secundary" style="background-color:#F44336; color:#FFFF">{{ __('Guardar') }}</button>
                            <a  class="btn btn-secundary" style="background-color:#000000; color:#FFFF;margin-left:50px" href="{{ route('categories.index')}}">{{ __('Cancelar') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection