@extends('layouts.main',['activePage' =>'users','titlePage'=>'Usuarios'])
@section('content')
<div class="content">
    <div class="content-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                        <div class="card-header card-header-secundary" style="background-color:#F44336">
                            <h4 class="card-tittle">Usuarios</h4>
                            <p class="card-category">Usuarios registrados</p>
                        </div>
                        <div class="card-body">
                            @if(session('notification'))
                            <div class="alert alert-success" role="success">
                                {{session('notification')}}
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-12 text-left">
                                    <a href="{{ route('users.create')}}" class="btn btn-sm btn-success" title="Agregar Usuario">
                                    <i class="material-icons">person_add_alt_1</i>
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table" id="usuarios">
                                    <thead class="text-secundary" style="color:#F44336">
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Usuario</th>
                                        <th>Fecha de Creacion</th>
                                        <th class="text-right">Acciones</th>                                        
                                    </thead>
                                    <tbody>
                                        @if(Auth::user()->rol=1)
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->username}}</td>
                                                <td>{{$user->created_at->diffForHumans()}}</td>
                                                <td class="td-actions text-right">
                                                    <a href="{{ route('users.show',$user->id)}}" class="btn btn-info" title="Ver"> <i class="material-icons">remove_red_eye</i></a>
                                                    <a href="{{ route('users.edit',$user->id)}}" class="btn btn-warning" title="Editar" type="button">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                                                                    
                                                    <button type="button" href="" data-target="#modal-delete-{{$user->id}}" data-toggle="modal" class="btn btn-danger" title="Eliminar">
                                                        <i class="material-icons" style="color:#FFFFFF">delete</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @include('users.modal')
                                        @endforeach
                                        @else
                                        <tr>
                                                <td>{{Auth::user()->id}}</td>
                                                <td>{{Auth::user()->name}}</td>
                                                <td>{{Auth::user()->email}}</td>
                                                <td>{{Auth::user()->username}}</td>
                                                <td>{{Auth::user()->created_at->diffForHumans()}}</td>
                                                <td class="td-actions text-right">
                                                    <a href="{{ route('users.show',Auth::user()->id)}}" class="btn btn-info" title="Ver"> <i class="material-icons">remove_red_eye</i></a>
                                                    <a href="{{route('users.edit',Auth::user()->id)}}" class="btn btn-warning" title="Editar" type="button">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    <a href="" data-target="#modal-delete-{{Auth::user()->id}}" data-toggle="modal"><button class="btn btn-danger" title="Borrar"><i class="material-icons" style="color:#FFFFFF">delete</i></button></a>                                                   
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer mr-auto">
                        {{$users->links()}}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection