@extends ('layouts.main',['activePage' =>'leakages','titlePage'=>'Fugas'])
@section ('content')
<div class="content">
    <div class="content-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-secundary" style="background-color:#F44336">
                                <h4 class="card-tittle">Fugas</h4>
                                <p class="card-category">Reportadas y Denunciadas</p>
                            </div>
                            <div class="card-body">
                            @if(session('notification'))
                            <div class="alert alert-success" role="success">
                                {{session('notification')}}
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-12 text-left">
                                <a href="{{ route('leakages.create')}}" class="btn btn-sm btn-success" title="Agregar Nueva Fuga">
                                    <i class="material-icons">add</i>
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table" id="lecturas">
                                    <thead class="text-secundary" style="color:#F44336">
                                        <th>ID</th>
                                        <th>Fecha</th>
                                        <th>Causa</th>
                                        <th>Perdida Estimada</th>
                                        <th class="text-right">Acciones</th>                                        
                                    </thead>
                                    <tbody>
                                        @foreach($leakages as $leakage)
                                            <tr>
                                                <td>{{$leakage->id}}</td>
                                                <td>{{$leakage->datetime}}</td>
                                                <td>{{$leakage->cause}}</td>
                                                <td>{{$leakage->stimad_less}}</td>
                                                <td class="td-actions text-right">
                                                    
                                                    <a href="{{ route('leakages.show',$leakage->id)}}"  class="btn btn-info" title="Ver"> <i class="material-icons">remove_red_eye</i></a>
                                                    <a class="btn btn-warning" href="{{route('leakages.edit',$leakage->id)}}" title="Editar" type="button">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    <a data-target="#modal-delete-{{$leakage->id}}" data-toggle="modal"><button class="btn btn-danger" title="Eliminar"><i class="material-icons" style="color:#FFFFFF">delete</i></button>
                                                </td>
                                            </tr>
                                            @include('leakages.modal')
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