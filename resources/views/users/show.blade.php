@extends('layouts.main',['activePage' =>'users','titlePage'=>'Usuarios'])
@section('content')
<div class="content">
    <div class="content-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-secundary" style="background-color:#F44336">
                    <div class="card-tittle">Usuarios</div>
                    <p class="card-category">Datos del Usuario</p>
                </div>
                <!-- body -->
                <div class="card-body" style="text-align:center">
                    <div class="row" > 
                        <div class="col-md-4" style="margin: 0 auto" >
                            <div class="card card-user">
                                <div class="card-body">
                                    <p class="card-text">
                                        <div class="author">
                                            <a href="#">
                                                <img src="{{asset('/img/default_avatar.png')}}" alt="image" class="avatar">
                                                <h5 class="title mt-3">{{$user->name}}</h5>
                                            </a>
                                            <p class="description">
                                            {{$user->username}} <br>
                                            {{$user->email}} <br>
                                            {{$user->created_at->diffForHumans()}} <br>
                                            
                                            </p>
                                        </div>
                                    </p>
                                    <div class="card-description">
                                        
                                    </div>
                                </div>
                                <div class="card-footer center" style="margin: 0 auto">
                                    <div class="button-container">
                                    <a href="{{ url()->previous() }}" class="btn btn-sm mr-3" style="background-color:#000000; color:#FFFF"> Volver</a>
                                       <!-- <button class="btn btn-sm btn-secundary" style="background-color:#F44336; color:#FFFF">
                                            Editar
                                        </button>!-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>
@endsection