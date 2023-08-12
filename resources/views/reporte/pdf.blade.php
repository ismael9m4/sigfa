<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="{{ asset('img/vue.png') }}">
    <title>Reporte PDF</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
    <script src="{{ asset('js/plugins/chartist.min.js') }}"></script>
    
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
        },
        options: {
        scales: {
            y: {
                beginAtZero: true
                }
            }
        }
        });
    </script>
    <script type="text/php">
        if ( isset($pdf) ) { 
            $pdf->page_script('
            if ($PAGE_COUNT > 1) {
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $size = 12;
                $pageText = "Pagina " . $PAGE_NUM . " of " . $PAGE_COUNT;
                $y = 15;
                $x = 520;
                $pdf->text($x, $y, $pageText, $font, $size);
                } 
            ');
        }
    </script>
    <style>
        @page {
            margin: 0cm 0cm;
            font-size: 1em;
        }
        body {
            margin: 3cm 2cm 2cm;
            font-size: 0.8em;
        }
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #EB3723;
            color: white;
            text-align: center;
            line-height: 30px;
        }
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #EB3723;
            color: white;
            text-align: center;
            line-height: 35px;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
    <body>
        <header>
            <br>
            <p><strong style="font-size: 1.2em;">REPORTE DEL SISTEMA DE DETECCION DE FUGAS DE AGUA </strong></p>
        </header>
    <main>
    <div class="content" style="text-align:center;">
        <div class="container-fluid" style="text-align:center;">
            <div class="col-lg-6 col-md-12" style="text-align:center; width: 80%;
                    margin: 0 auto; margin-top: 80px">
                <div class="col-lg-6 col-md-12" style="text-align:center; width: 70%;margin: 0 auto;">
                    <div class="card" style="text-align:center;">
                        <div class="card-title">
                            <h5 style="text-align: center ;background-color: #4CAF50;font-size: 1em"><strong>TABLA DE USUARIOS ADMIN</strong></h5>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th scope="col" >Empleado</th>
                                        <th scope="col" >Usuario</th>
                                        <th scope="col" >Tiempo </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($usersmyA as $user)
                                        <tr>
                                            <td scope="col" style="line-height: normal;vertical-align: middle;">{{$user->name}}</td>
                                            <td scope="col" style="line-height: normal;vertical-align: middle;">{{$user->username}}</td>
                                            <td scope="col" style="line-height: normal;vertical-align: middle;">{{$user->created_at->diffForHumans()}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <div class="col-lg-6 col-md-12" style="text-align:center; width: 70%;margin: 0 auto;">
                    <div class="card">
                        <div class="card-title">
                            <h5 style="text-align: center ;background-color: #FAAB25; font-size: 1em;"><strong>TABLA DE USUARIOS </strong></h5>
                        </div>
                        <div class="card-body table-responsive"> 
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th scope="col" style="line-height: normal;vertical-align: middle;">Empleado</th>
                                        <th scope="col" style="line-height: normal;vertical-align: middle;">Usuario</th>
                                        <th scope="col" style="line-height: normal;vertical-align: middle;">Tiempo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($usersmyNA as $user)
                                        <tr>
                                            <td scope="col" style="line-height: normal;vertical-align: middle;">{{$user->name}}</td>
                                            <td scope="col" style="line-height: normal;vertical-align: middle;">{{$user->username}}</td>
                                            <td scope="col" style="line-height: normal;vertical-align: middle;">{{$user->created_at->diffForHumans()}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>    
            </div>                
            <div class="col-lg-6 col-md-12" style="text-align:center; width: 70%;margin: 0 auto">
                    <div class="card">
                        <div class="card-title">
                            <h5 style="text-align: center ;background-color: #599EF5; font-size: 1em;"><strong>TABLA DE ZONA DE RIESGO </strong></h5>
                        </div>
                        <div class="card-body table-responsive"> 
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th scope="col" style="line-height: normal;vertical-align: middle;">ID</th>
                                        <th scope="col" style="line-height: normal;vertical-align: middle;">Zona o Localidad</th>
                                        <th scope="col" style="line-height: normal;vertical-align: middle;">Tiempo de Registro</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        @foreach($zonas as $zona)
                                            <tr>
                                                <td scope="col" style="line-height: normal;vertical-align: middle;">{{$zona->id}}</td>
                                                <td scope="col" style="line-height: normal;vertical-align: middle;">{{$zona->neighborhood}}</td>
                                                <td scope="col" style="line-height: normal;vertical-align: middle;">{{$zona->created_at->diffForHumans()}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                        </div>
                    </div>    
            </div>
            </div>

            <div class="page-break"></div>  
            <div class="col-lg-6 col-md-12" style="text-align:center; width: 50%;
                    margin: 0 auto">
                    <div class="card" style=" display: flex; align-items: center">
                        <div class="card-title">
                            <h5 style=" text-align: center ; font-size: 1em;"><strong>SENSORES REGISTRADOS</strong></h5>
                        </div>
                        <div class="card card-stats">
                            <img style="margin-top:30px" width="300" height="200" src="{{$grafico2}}">
                        </div>
                    </div>
                    <div class="card" style=" display: flex; align-items: center">
                        <div class="card-title">
                            <h5 style=" text-align: center ; font-size: 1em;"><strong>FUGAS REGISTRADAS</strong></h5>
                        </div>
                        <div class="card card-stats">
                            <img style="margin-top:30px" width="300" height="200" src="{{$grafico3}}">
                        </div>
                    </div>
                    <div class="card" style=" display: flex; align-items: center">
                        <div class="card-title">
                            <h5 style="text-align: center ; font-size: 1em;"><strong>CANTIDAD DE LECTURAS DEL PRESENTE AÑO</strong></h5>
                        </div>
                        <div class="card card-stats">
                            <img style="margin-top:50px" width="300" height="200" src="{{$grafico}}">
                        </div>
                    </div>   
            </div> 
            
            <div class="col-lg-6 col-md-12" style="text-align:center; width: 50%;
                    margin: 0 auto;">
                <div class="card">
                        <div class="card-title">
                            <h5 style="text-align: center ; font-size: 1em;"><strong>ESTADO DE LA RED</strong></h5>
                        </div>
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <p style="margin-top:30px" class="card-category">Volumen Promedio Total </p>
                                <h3 class="card-title">{{ $volumenPromedio }} L</h3>
                                <p style="margin-top:30px" class="card-category">Volumen Nocturno Promedio</p>
                                <h3 class="card-title">{{ $volumenNocturno }} L</h3>
                            </div>
                        </div>
                </div>
                <div class="card">
                        <div class="card-title">
                            <h5 style="text-align: center ; font-size: 1em;"><strong>DETECCIONES</strong></h5>
                        </div>
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <p style="margin-top:30px" class="card-category">Cantidad Total en este Año </p>
                                <h3 class="card-title">{{$cantDetAñoActual}}</h3>
                            </div>
                        </div>
                </div> 
                <div class="card">
                        <div class="card-title">
                            <h5 style="text-align: center ; font-size: 1em;"><strong>FUGAS POR DENUNCIA</strong></h5>
                        </div>
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <p style="margin-top:30px" class="card-category">Cantidad Total este año </p>
                                <h3 class="card-title">{{$cantfugaAñoActual}}</h3>
                            </div>
                        </div>
                </div>     
            </div>
        </div>   
    </div>   
    </main>
    <footer id="pie">
        <p><strong>Copyright &copy; <?php echo date("d-m-Y");?> </strong></p>
    </footer>
</body>
</html>