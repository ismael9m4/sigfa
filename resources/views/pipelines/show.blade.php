@extends('layouts.main',['activePage' =>'pipelines','titlePage'=>'Tuberias'])
@section('content')
<div class="content">
    <div class="content-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-secundary" style="background-color:#F44336">
                    <div class="card-tittle">Tuberia</div>
                    <p class="card-category">Datos de la Tuberia</p>
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
                                                <h5 class="title mt-3">{{'Tuberia'}}</h5>
                                            </a>
                                            <p class="description">
                                            {{$pipeline->country}} <br>
                                            {{$pipeline->province}} <br>
                                            {{$pipeline->location}} <br>
                                            {{$pipeline->neighborhood}} <br>
                                            {{$pipeline->material}} <br>
                                            {{$pipeline->diameter}} (mm)<br>
                                            {{$pipeline->thickness}}(mm) <br>
                                            {{$pipeline->length}} (m) <br>
                                            {{$pipeline->depth_earth}} (mm) <br>
                                            {{$pipeline->type_cover}} <br>
                                            </p>
                                        </div>
                                    </p>
                                    <div class="card-description">
                                        
                                    </div>
                                </div>
                                <div class="card-footer center" style="margin: 0 auto">
                                    <div class="button-container">
                                    <a href="{{ route('pipelines.index')}}" class="btn btn-sm mr-3" style="background-color:#000000; color:#FFFF"> Volver</a>
                                        
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