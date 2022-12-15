@extends ('layouts.main',['activePage' =>'levels','titlePage'=>'Niveles'])
@section ('content')
<div class="content">
    <div class="content-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-secundary" style="background-color:#F44336">
                                <h4 class="card-tittle">Niveles de Atencion</h4>
                                <p class="card-category">realizados a Incidentes</p>
                            </div>
                            <div class="card-body">
                            @if(session('success'))
                            <div class="alert alert-success" role="success">
                                {{session('success')}}
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-12 text-left">
                                    <a href="{{ route('levels.create')}}" title="Agregar Nivel" class="btn btn-sm btn-success" >
                                    <i class="material-icons">add</i>
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-secundary" style="color:#F44336">
                                        <th>ID</th>
                                        <th>Nombre de Categoria</th>
                                        <th>Detalles</th>
                                        <th class="text-right">Acciones</th>                                        
                                    </thead>
                                    <tbody>
                                        @foreach($levels as $level)
                                            <tr>
                                                <td>{{$level->id}}</td>
                                                <td>{{$level->name}}</td>
                                                <td>{{$level->description}}</td>
                                                <td class="td-actions text-right">
                                                    
                                                    <a href="#" class="btn btn-info"> <i class="material-icons">remove_red_eye</i></a>
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