@extends ('layouts.main',['activePage' =>'categories','titlePage'=>'Categorias'])
@section ('content')
<div class="content">
    <div class="content-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-secundary" style="background-color:#F44336">
                                <h4 class="card-tittle">Categorias</h4>
                                <p class="card-category">de Fugas de Agua</p>
                            </div>
                            <div class="card-body">
                            @if(session('notification'))
                            <div class="alert alert-success" role="success">
                                {{session('notification')}}
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-12 text-left">
                                    <a href="{{ route('categories.create')}}" title="Agregar Categoria" class="btn btn-sm btn-success" >
                                    <i class="material-icons">add</i>
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-secundary" style="color:#F44336">
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th class="text-right">Acciones</th>                                        
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>{{$category->id}}</td>
                                                <td>{{$category->name}}</td>
                                                <td class="td-actions text-right">
                                                    
                                                <a href="{{ route('categories.show',$category->id)}}" title="Ver" class="btn btn-info"> <i class="material-icons">remove_red_eye</i></a>
                                                    <a class="btn btn-warning" href="{{route('categories.edit',$category->id)}}" title="Editar" type="button">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    <a href="" data-target="#modal-delete-{{$category->id}}" data-toggle="modal" class="btn btn-danger" title="Eliminar"><i class="material-icons" style="color:#FFFFFF">delete</i></a>
                                                </td>
                                            </tr>
                                            @include('categories.modal')
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