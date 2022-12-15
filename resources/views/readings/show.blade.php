@extends('layouts.main',['activePage' =>'readings','titlePage'=>'Lectura'])
@section('content')
<div class="content">
    <div class="content-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-secundary" style="background-color:#F44336">
                    <div class="card-tittle">Lectura</div>
                    <p class="card-category">Datos de la Lectura</p>
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
                                                
                                                <h5 class="title mt-3">{{$reading->details}}</h5>
                                            </a>
                                            <p class="description">
                                            {{$reading->date}} <br>
                                            {{$reading->hour}} <br>
                                            {{number_format($reading->value,5,",",".")}} 
                                            {{ $reading->unit}} <br>
                                            </p>
                                        </div>
                                    </p>
                                    <div class="card-description">
                                        
                                    </div>
                                </div>
                                <div class="card-footer center" style="margin: 0 auto">
                                    <div class="button-container">
                                    <a href="{{ route('readings.index')}}" class="btn btn-sm mr-3" style="background-color:#000000; color:#FFFF"> Volver</a>
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