@extends('layouts.main',['activePage' =>'incidents','titlePage'=>'Incidentes de Fuga'])
@section('content')
<div class="content">
    <div class="content-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                        <div class="card-header card-header-secundary" style="background-color:#F44336">
                            <h4 class="card-tittle">Incidentes de Fuga</h4>
                            <p class="card-category">Registros de Atencion de Incidentes</p>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                            <div class="alert alert-success" role="success">
                                {{session('success')}}
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-12 text-left">
                                    <a href="{{ route('incidents.create')}}" title="Agregar Incidente" class="btn btn-sm btn-success" >
                                    <i class="material-icons">add</i>
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table" id="incidentes">
                                    <thead class="text-secundary" style="color:#F44336">
                                        <th>ID</th>
                                        <th>Titulo</th>
                                        <th>Severidad</th>
                                        <th>Tecnico Asignado</th>
                                        <th class="text-right">Acciones</th>                                        
                                    </thead>
                                    <tbody>
                                        @foreach($incidents as $incident)
                                            <tr>
                                                <td>{{$incident->id}}</td>
                                                <td>{{$incident->title}}</td>
                                                <td>{{$incident->severity}}</td>
                                                <td>{{$incident->name}}</td>
                                                <td class="td-actions text-right">
                                                    
                                                    <a href="{{ route('incidents.show',$incident->id)}}" title="Ver" class="btn btn-info"> <i class="material-icons">person</i></a>
                                                    <button class="btn btn-warning" title="Editar" type="button">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button class="btn btn-danger" title="Eliminar" type="button">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer mr-auto">
                        
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection