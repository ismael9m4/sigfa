@extends ('layouts.main',['activePage' =>'sensors','titlePage'=>'Sensores'])
@section ('content')
<div class="content">
    <div class="content-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-secundary" style="background-color:#F44336">
                                <h4 class="card-tittle">Sensores</h4>
                                <p class="card-category">Sensores registrados</p>
                            </div>
                            <div class="card-body">
                            @if(session('notification'))
                            <div class="alert alert-success" role="success">
                                {{session('notification')}}
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-12 text-left">
                                    <a href="{{ route('sensors.create')}}" class="btn btn-sm btn-success" title="Agregar Sensor">
                                    <i class="material-icons">add</i>
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-secundary" style="color:#F44336">
                                        <th>ID</th>
                                        <th>Estado</th>
                                        <th>Condicion</th>
                                        <th>Tipo</th>
                                        <th>Dispositivo</th>
                                        <th class="text-right">Acciones</th>                                        
                                    </thead>
                                    <tbody>
                                        @foreach($sensors as $sensor)
                                            <tr>
                                                <td>{{$sensor->id}}</td>
                                                <td>{{$sensor->state}}</td>
                                                <td>{{$sensor->condition_sensor}}</td>
                                                <td>{{$sensor->type}}</td>
                                                <td>{{$sensor->serie}}</td>
                                                <td class="td-actions text-right">
                                                    
                                                    <a href="{{ route('sensors.show',$sensor->id)}}" class="btn btn-info" title="Ver"> <i class="material-icons">remove_red_eye</i></a>
                                                    <a class="btn btn-warning" href="{{route('sensors.edit',$sensor->id)}}" title="Editar" type="button">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    <a data-target="#modal-delete-{{$sensor->id}}" data-toggle="modal"><button class="btn btn-danger" title="Eliminar"><i class="material-icons" style="color:#FFFFFF">delete</i></button>
                                                </td>
                                            </tr>
                                            @include('sensors.modal')
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