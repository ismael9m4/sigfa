@extends('layouts.main',['activePage' =>'sensors','titlePage'=>'Sensores'])
@section('content')
<div class="content">
    <div class="content-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-secundary" style="background-color:#F44336">
                    <div class="card-tittle">Sensor</div>
                    <p class="card-category">Datos del Sensor</p>
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
                                                <h5 class="title mt-3">{{'Sensor'}}</h5>
                                            </a>
                                            <p class="description">
                                            {{$sensor->state}} <br>
                                            {{$sensor->condition_sensor}} <br>
                                            {{$sensor->type}} <br>
                                            {{$sensor->description}} <br>
                                            </p>
                                        </div>
                                    </p>
                                    <div class="card-description">
                                        
                                    </div>
                                </div>
                                <div class="card-footer center" style="margin: 0 auto">
                                    <div class="button-container">
                                    <a href="{{ route('sensors.index')}}" class="btn btn-sm mr-3" style="background-color:#000000; color:#FFFF"> Volver</a>
                                        
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