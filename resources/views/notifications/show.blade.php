@extends('layouts.main',['activePage' =>'notifications','titlePage'=>'Notificacion'])
@section('content')
<div class="content">
    <div class="content-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-secundary" style="background-color:#F44336">
                    <div class="card-tittle">Notificacion</div>
                    <p class="card-category">Datos de la Notificacion</p>
                </div>
                <!-- body -->
                <div class="card-body" style="text-align:center">
                    <div class="row" > 
                        <div class="col-md-4" style="margin: 0 auto" >
                            <div class="card card-user">
                                <div class="card-body">
                                    <p class="card-text">
                                        <div class="author">
                                            <a href="#">
                                                <img src="{{asset('/img/default_avatar.png')}}" alt="image" class="avatar">
                                                <h5 class="title mt-3">{{'Notificacion'}}</h5>
                                            </a>
                                            <p class="description">
                                            {{$notifis->created_at}} <br>
                                            {{$notifis->data['title']}} <br>
                                            {{$notifis->data['numerofugas']}} <br>
                                            @if(($notifis->read_at) === null)
                                                        {{'Leida:No'}}
                                                    @else
                                                        {{'Leida:Si'}}
                                                    @endif<br>
                                            </p>
                                        </div>
                                    </p>
                                    <div class="card-description">
                                        
                                    </div>
                                </div>
                                <div class="card-footer center" style="margin: 0 auto">
                                    <div class="button-container">
                                    <a href="{{ url('/notificaciones')}}" class="btn btn-sm mr-3" style="background-color:#000000; color:#FFFF"> Volver</a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>
@endsection