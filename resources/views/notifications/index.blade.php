@extends ('layouts.main',['activePage' =>'notifications','titlePage'=>'Notificaciones'])
@section ('content')
<div class="content">
    <div class="content-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-secundary" style="background-color:#F44336">
                                <h4 class="card-tittle">Notificaciones</h4>
                                <p class="card-category">Leidas y No leidas</p>
                            </div>
                            <div class="card-body">
                            @if(session('success'))
                            <div class="alert alert-success" role="success">
                                {{session('success')}}
                            </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table" id="notificaciones">
                                    <thead class="text-secundary" style="color:#F44336">
                                        <th>Fecha</th>
                                        <th>Titulo</th>
                                        <th>Fugas Detectadas</th>
                                        <th>Leida</th>
                                        <th class="text-right">Acciones</th>                                        
                                    </thead>
                                    <tbody>
                                        @foreach($notifis as $notifi)
                                            <tr>
                                                <td>{{$notifi->created_at}}</td>
                                                <td>{{$notifi->data['title']}}</td>
                                                <td>{{$notifi->data['numerofugas']}}</td>
                                                <td>@if(($notifi->read_at) === null)
                                                        {{'No'}}
                                                    @else
                                                        {{'Si'}}
                                                    @endif
                                                    </td>
                                                <td class="td-actions text-right">
                                                    
                                                    <a href="{{ url('/shownotificaciones',$notifi->id)}}"  class="btn btn-info" title="Ver"> <i class="material-icons">remove_red_eye</i></a>
                                                  
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