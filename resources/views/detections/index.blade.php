@extends ('layouts.main',['activePage' =>'readings','titlePage'=>'Detecciones'])
@section ('content')
<div class="content">
    <div class="content-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-secundary" style="background-color:#F44336">
                                <h4 class="card-tittle">Detecciones</h4>
                                <p class="card-category">Fugas Detectadas por el Sistema</p>
                            </div>
                            <div class="card-body">
                            @if(session('success'))
                            <div class="alert alert-success" role="success">
                                {{session('success')}}
                            </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table" id="lecturas">
                                    <thead class="text-secundary" style="color:#F44336">
                                        <th>ID</th>
                                        <th>Fecha y Hora</th>
                                        <th>Causa</th>
                                        <th>Ciudad</th>
                                        <th class="text-right">Acciones</th>                                        
                                    </thead>
                                    <tbody>
                                        @foreach($detections as $detection)
                                            <tr>
                                                <td>{{$detection->id}}</td>
                                                <td>{{$detection->created_at}}</td>
                                                <td>{{$detection->cause}}</td>
                                                <td>{{$detection->neighborhood}}</td>
                                                <td class="td-actions text-right">
                                                    
                                                    <a href="{{ route('detections.show',$detection->id)}}" class="btn btn-info" title="Ver"> <i class="material-icons">remove_red_eye</i></a>
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