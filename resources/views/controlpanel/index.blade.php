@extends('layouts.main',['activePage' =>'panels','titlePage'=>''])
@section('content')
<div class="content">
    <div class="content-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                        <div class="card-header card-header-secundary" style="background-color:#F44336">
                            <h4 class="card-tittle">Panel de Control</h4>
                            <p class="card-category">Utilidades</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card card-botton">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <div class="option-1" style="text-align:center">
                                                        <md-button class="md-primary md-lg"> <i class="material-icons" style="font-size: 50px;color:#d50000">settings_remote</i>
                                                        </md-button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-footer ml-auto mr-auto" >
                                                    <!-- Inicio Modal-->
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-danger" id="deteccion-btn" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Detector de Fuga
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Resultado</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                            <form>
                                                            <div class="modal-body">
                                                                <div class="row mb-6">
                                                                @if ($cantidadFugas === 0)
                                                                <label for="inputEmail3" class="col-sm-12 col-form-label" style="background-color:#FFFFFF;text-align:center">Buena jornada! No se han detectado fugas</label>
                                                                        @else
                                                                        <label for="inputEmail3" class="col-sm-12 col-form-label" style="background-color:#FFFFFF;text-align:center">Se ha detectado una fuga</label>
                                                                        @endif
                                                                </div>

                                                                <div class="row mb-6">
                                                                <label for="inputEmail3" class="col-sm-4 col-form-label">Fecha y Hora de Deteccion</label>
                                                                <div class="col-sm-8">
                                                                    <label for="inputEmail3" class="col-sm-6 col-form-label"><?php echo date("d-m-Y H:i:s");?> </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secundary" style="background-color:#000000; color:#FFFF" data-bs-dismiss="modal">Finalizar</button>
                                                    <a href="{{ route('detections.index')}}" class="btn btn-secundary" type="button" style="background-color:#F44336; color:#FFFF" >Ir a Listado</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                    <!-- Fin modal -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- fin de col-md 1-->
                                <div class="col-md-3 " >
                                    <div class="card card-botton">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <div class="option-2" style="text-align:center">
                                                        <md-button class="md-primary md-lg"> <i class="material-icons" style="font-size: 50px;color:#00c853">description</i>
                                                        </md-button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-footer ml-auto mr-auto" >
                                                        <a href="{{ route('leakages.index')}}" type="button" class="btn btn-info" style="background-color:#00c853;text-align:center;margin-button:0px;color:#f5f5f5" >Fugas de Agua</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- fin de col-md 2-->
                                <div class="col-md-3">
                                    <div class="card card-botton">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <div class="option-3" style="text-align:center">
                                                        <md-button class="md-primary md-lg"> <i class="material-icons" style="font-size: 50px;color:#ef6c00">av_timer</i>
                                                        </md-button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-footer ml-auto mr-auto">
                                                        <!-- Inicio Modal-->
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-danger" id="prediccion-btn"  style="background-color:#ef6c00;text-align:center;margin-button:0px;color:#f5f5f5" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                                    Predictor de Fuga
                                                    </button>
                                                    <!-- Script para manejar el evento de clic en el botón -->
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Indice de Ocurrencia</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                            <form>
                                                                <div class="modal-body">
                                                                <div class="row">
                                                                    <label for="colFormLabelLg" class="col-sm-8 col-form-label col-form-label-lg" style="text-align:center">
                                                                        @if($prediccion===false)
                                                                            Resultado: {{10}} %
                                                                        @else
                                                                            Resultado: {{$prediccion*100}} %
                                                                        @endif</label>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm">Fecha: <?php echo date("d-m-Y ");?></label>
                                                                    <div class="col-sm-10">
                                                                        <label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm">Hora: <?php echo date(" H:i:s");?> </label>
                                                                    </div>
                                                                    <label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm">Lugar: A - LAS PERAS</label>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="colFormLabel" class="col-sm-2 col-form-label">Usuario</label>
                                                                <div class="col-sm-10">
                                                                    <label for="colFormLabel" class="col-sm-8 col-form-label">{{auth()->user()->name}}</label>
                                                                </div>
                                                                </div>
                                                                </div>
                                                            </form>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color:#000000; color:#FFFF">Finalizar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                    <!-- Fin modal -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- fin de col-md 3-->
                                <div class="col-md-3">                                    
                                    <div class="card card-botton">
                                        <div class="row">
                                            <div class="col-md-12">
                                                
                                                    <div class="card-body">                                       
                                                        <div class="option-4" style="text-align:center">
                                                            <md-button class="md-primary md-lg"> <i class="material-icons" style="font-size: 50px;color:#039be5">slow_motion_video</i>
                                                            </md-button>
                                                        </div>                                            
                                                    </div>
                                                    
                                            </div>
                                        </div>    
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-footer ml-auto mr-auto">
                                                    <!-- Inicio Modal-->
                                                    <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-info" href="{{ route('panels.rendimiento')}}" style="background-color:#039be5;text-align:center;margin-button:0px;color:#f5f5f5" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                                                        Parametros de la Red</button>
                                                        <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Resultado</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                            <form >
                                                                <div class="modal-body" >
                                                                    <div class="row">
                                                                        <label for="colFormLabelLg" class="col-sm-12 col-form-label col-form-label-lg" style="text-align:center">Indicadores de rendimiento </label>
                                                                        <label for="colFormLabelLg" class="col-sm-6 col-form-label col-form-label-sm" style="text-align:center">Distrito: A - LAS PERAS </label>
                                                                    </div>
                                                                <div class="row mb-3">
                                                                    <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm" style="text-align:center">Caudal Neto en la red:</label>
                                                                    <div class="col-sm-12">
                                                                    <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm" style="text-align:center">{{$volumenNeto}} L</label>                                                                    </div>
                                                                </div>
                                                                    <div class="row mb-3">
                                                                        <label for="colFormLabel" class="col-sm-12 col-form-label" style="text-align:center" >Caudal Promedio Total:</label>
                                                                    <div class="col-sm-12">
                                                                        <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm" style="text-align:center">{{$volumenPromedio}} L</label>  
                                                                    </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label for="colFormLabel" class="col-sm-12 col-form-label" style="text-align:center">Caudal Nocturno Total:</label>
                                                                    <div class="col-sm-12">
                                                                        <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm" style="text-align:center">{{$volumenNocturno}} L</label>  
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" style="background-color:#000000; color:#FFFF" data-bs-dismiss="modal">Finalizar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                    <!-- Fin modal -->
                                                    </div>
                                                </div>                                                
                                            </div>
                                        </div>
                                    </div>                                     
                                </div><!-- fin de col-md 4-->
                            </div>
                        </div><!-- fin de card-body -->
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection