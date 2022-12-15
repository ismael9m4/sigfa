@extends ('layouts.main',['activePage' =>'pipelines','titlePage'=>'Tuberias'])
@section ('content')
<div class="content">
    <div class="content-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-secundary" style="background-color:#F44336">
                                <h4 class="card-tittle">Tuberias</h4>
                                <p class="card-category">Conductos de agua</p>
                            </div>
                            <div class="card-body">
                            @if(session('notification'))
                            <div class="alert alert-success" role="success">
                                {{session('notification')}}
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-12 text-left">
                                    <a href="{{ route('pipelines.create')}}" title="Agregar Tuberia" class="btn btn-sm btn-success" >
                                    <i class="material-icons">add</i>
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-secundary" style="color:#F44336">
                                        <th>ID</th>
                                        <th>Posicion</th>
                                        <th>Diametro de conducto (mm)</th>
                                        <th>Longitud (m)</th>
                                        <th class="text-right">Acciones</th>                                        
                                    </thead>
                                    <tbody>
                                        @foreach($pipelines as $pipeline)
                                            <tr>
                                                <td>{{$pipeline->id}}</td>
                                                <td>{{$pipeline->positiong}}</td>
                                                <td>{{$pipeline->diameter}}</td>
                                                <td>{{$pipeline->length}}</td>
                                                <td class="td-actions text-right">
                                                    
                                                    <a href="{{ route('pipelines.show',$pipeline->id)}}" class="btn btn-info" title="Ver"> <i class="material-icons">remove_red_eye</i></a>
                                                    <a class="btn btn-warning" href="{{route('pipelines.edit',$pipeline->id)}}" title="Editar" type="button">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    <a href="" data-target="#modal-delete-{{$pipeline->id}}" data-toggle="modal"><button class="btn btn-danger" title="Eliminar"><i class="material-icons" style="color:#FFFFFF">delete</i></button> </a>
                                                </td>
                                            </tr>
                                            @include('pipelines.modal')
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