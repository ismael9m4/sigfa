@extends('layouts.main', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])
@section('content')
  <div class="content">
     <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">settings_input_antenna</i>
              </div>
              <p class="card-category">Sensores </p>
              <h3 class="card-title">{{$sensoresd}}/{{$sensores}}
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">sensors</i> Disponibles/Total
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">perm_phone_msg</i>
              </div>
              <p class="card-category">Fugas</p>
              <h3 class="card-title">{{$fugas}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">app_registration</i> Registradas en el Sistema
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">info_outline</i>
              </div>
              <p class="card-category">Detecciones</p>
              <h3 class="card-title">{{$detecciones}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">local_offer</i> Cantidad Total hasta la fecha
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="fa fa-users"></i>
              </div>
              <p class="card-category">Usuarios</p>
              <h3 class="card-title">{{$users}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">update</i> Actualizado
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card card-chart">
            <!-- Inicio cambios-->
            <div class="card-header card-header-success">
              <canvas id="lecturasRegistradas" ></canvas>
            </div>
            <!-- Fin cambios -->
            <div class="card-body">
              <h4 class="card-title">Lecturas de Sensores</h4>
              <p class="card-category">
                <span class="text-success"><i class="fa fa-long-arrow-up"></i>  {{$variacion}}%</span> Variante de Caudal.</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> Segun ultimos registros
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-warning">
              <canvas id="fugasDetectadas"></canvas>
            </div>
            <div class="card-body">
              <h4 class="card-title">Fugas Detectadas</h4>
              <p class="card-category">Por lecturas</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> Estimadas hace 1 dia
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-danger">
              <canvas  id="perdidaFuga"></canvas>
            </div>
            <div class="card-body">
              <h4 class="card-title">Pérdidas por Fugas</h4>
              <p class="card-category">Ultimas Asistencias</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> Esta semana
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row" >
      <div class="col-md-6">
          <div class="card card-chart">
            <div class="card-header card-header-dark">
              <canvas  id="lecturaValvula"></canvas>
            </div>
            <div class="card-body">
              <h4 class="card-title">Indicador de Válvula</h4>
              <p class="card-category">Estado:{{$estadovalvula}}</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> Hasta la fecha
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card card-chart">
            <div class="card-header card-header-info">
              <canvas  id="lecturaPresion"></canvas>
            </div>
            <div class="card-body">
              <h4 class="card-title">Lectura de Sensores</h4>
              <p class="card-category">Ultimas Lecturas de Presion</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> Hasta la fecha
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
              <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">         
                  <h4 class="card-title" style="text-align:center"><i class="material-icons">travel_explore</i>   Zonas en Riesgo</h4>                 
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="tab-pane active">
                
                
                
                <div class="tab-pane" id="zona">
                
              <table class="table">
                <thead class="text-primary">
                  <th>Zonas</th>
                  <th>Cant. de predicciones</th>
                  <th>Fecha y Hora</th>
                  <th>Nivel de Riesgo</th>
                </thead>
                <tbody>
                @foreach($zonas as $zona)
                  <tr>
                    <td>{{$zona->neighborhood}}</td>
                    <td style="text-align:center">{{$zona->id}}</td>
                    <td>{{$zona->created_at}}</td>
                    <td style="text-align:center">{{$nivel['nivel'][$i++]}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title" style="text-align:center">Otros Usuarios Administradores</h4>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover" style="text-align:center;">
                <thead class="text-warning">
                  <th>Empleado</th>
                  <th>Nombre de Usuario</th>
                  <th>Registro al Servicio</th>
                </thead>
                <tbody>
                @foreach($usersmy as $user)
                  <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div> 
  </div>
@endsection
