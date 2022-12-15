@extends ('layouts.main',['activePage' =>'readings','titlePage'=>'Lecturas'])
@section ('content')
<div class="content">
    <div class="content-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-secundary" style="background-color:#F44336">
                                <h4 class="card-tittle">Lecturas de Sensores</h4>
                                <p class="card-category">Lecturas registrados</p>
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
                                        <th>Fecha</th>
                                        <th>Valor de Lectura</th>
                                        <th>Unidad</th>
                                        <th>Sensor</th>
                                        <th>Dispositivo</th>
                                        <th class="text-right">Acciones</th>                                        
                                    </thead>
                                    <tbody>
                                        @foreach($readings as $reading)
                                            <tr>
                                                <td>{{$reading->id}}</td>
                                                <td>{{$reading->date}}</td>
                                                <td>{{number_format($reading->value,5,",",".")}}</td>
                                                <td>{{$reading->unit}}</td>
                                                <td>{{$reading->type}}</td>
                                                <td>{{$reading->serie}}</td>
                                                <td class="td-actions text-right">
                                                    
                                                    <a href="{{ route('readings.show',$reading->id)}}" title="Ver" class="btn btn-info"> <i class="material-icons">remove_red_eye</i></a>
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