@extends('layouts.main',['activePage' => 'incidents','titlePage' => 'Nuevo Incidente de Fuga'])
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
                <form method="post" action="{{route('incidents.store')}}"  class="form-horizontal">
                    @csrf
                    <div class="card ">
                        <div class="card-header card-header-secundary" style="background-color:#F44336">
                            <h4 class="card-title">{{ __('Nuevo Incidente') }}</h4>
                            <p class="card-category">{{ __('Ingresar Datos') }}</p>
                        </div>
                        <div class="card body">
                            <div class="row">
                                <label for="title" class="col-sm-2 col-form-label" style="margin-left:50px" >Titulo de Incidente</label>
                                <div class="col-sm-6">
                                    <input class="form-control" name="title" type="text" placeholder="Ingrese titulo" required="true" aria-required="true" autofocus value="{{old('title')}}"/>
                                </div>                             
                            </div>



                            <div class="row" style="margin-top:30px">
                                <label for="fk_level" class="col-sm-2 col-form-label" style="margin-left:50px">Nivel</label>
                                    <select name="fk_level" class="col-sm-3">
                                        <option value="S">Seleccione</option>
                                        @foreach($levels as $level)
                                            <option value="{{ $level->id }}" >{{ $level->name}}</option>
                                        @endforeach
                                    </select>

                                    <label for="fk_client" class="col-sm-2 col-form-label" style="margin-left:50px" >Reportador</label>
                                    <select name="fk_client" class="col-sm-3">
                                        <option value="{{ $nameAuth->id }}">{{ $nameAuth->name}}</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name}}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="row" style="margin-top:30px" >
                                <label for="severity" class="col-sm-2 col-form-label" style="margin-left:50px" >Severidad</label>
                                    <select name="severity" class="col-sm-3">
                                        <option value="B" >Bajo</option>
                                        <option value="N" selected="selected">Normal</option>
                                        <option value="A">Alto</option>
                                    </select>
                                
                                    <label for="fk_support" class="col-sm-2 col-form-label" style="margin-left:50px" >Asistidor</label>
                                    <select name="fk_support" class="col-sm-3">
                                        <option value="{{ $nameAuth->id }}">{{ $nameAuth->name}}</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name}}</option>
                                        @endforeach
                                    </select>                                                
                            </div>

                        <div class="row" style="margin-top:30px" >
                            <label class="col-sm-2 col-form-label" for="description" style="margin-left:50px">{{ __('Descripcion') }}</label>
                                <div class="col-sm-6">
                                    <textarea  name="description" class="form-control"  placeholder="Ingrese Descripcion" rows="4">{{old('description')}}</textarea>    
                                </div>
                        </div>

                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-secundary" style="background-color:#F44336; color:#FFFF">{{ __('Guardar') }}</button>
                            <button type="submit" class="btn btn-secundary" style="background-color:#000000; color:#FFFF;margin-left:50px" href="{{url()->previous()}}">{{ __('Cancelar') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection