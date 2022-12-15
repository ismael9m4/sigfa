<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('Sigfa') }}</title>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('css/material-dashboard.css?v=2.1.1') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="css/estilos.css"/>
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
    <!-- CSS para Datatables.net -->
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.page_templates.auth')
        @endauth
        @guest()
            @include('layouts.page_templates.guest')
        @endguest
        <!--   Unknow Files   -->
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
        <!--   Core JS Files   -->
        <script src="{{ asset('js/core/jquery.min.js') }}"></script>
        <script src="{{ asset('js/core/popper.min.js') }}"></script>
        <script src="{{ asset('js/core/bootstrap-material-design.min.js') }}"></script>
        <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
        <!-- Plugin for the momentJs  -->
        <script src="{{ asset('js/plugins/moment.min.js') }}"></script>
        <!--  Plugin for Sweet Alert -->
        <script src="{{ asset('js/plugins/sweetalert2.js') }}"></script>
        <!-- Forms Validations Plugin -->
        <script src="{{ asset('js/plugins/jquery.validate.min.js') }}"></script>
        <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
        <script src="{{ asset('js/plugins/jquery.bootstrap-wizard.js') }}"></script>
        <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
        <script src="{{ asset('js/plugins/bootstrap-selectpicker.js') }}"></script>
        <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
        <script src="{{ asset('js/plugins/bootstrap-datetimepicker.min.js') }}"></script>
        <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
        <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
        <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
        <script src="{{ asset('js/plugins/bootstrap-tagsinput.js') }}"></script>
        <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
        <script src="{{ asset('js/plugins/jasny-bootstrap.min.js') }}"></script>
        <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
        <script src="{{ asset('js/plugins/fullcalendar.min.js') }}"></script>
        <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
        <script src="{{ asset('js/plugins/jquery-jvectormap.js') }}"></script>
        <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
        <script src="{{ asset('js/plugins/nouislider.min.js') }}"></script>
        <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
        <!-- Library for adding dinamically elements -->
        <script src="{{ asset('js/plugins/arrive.min.js') }}"></script>
        <!--  Google Maps Plugin    -->
        
        <!-- Chartist JS -->
        <script src="{{ asset('js/plugins/chartist.min.js') }}"></script>
        <!--  Notifications Plugin    -->
        <script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{ asset('js/material-dashboard.js?v=2.1.1') }}" type="text/javascript"></script>
        <!-- Material Dashboard DEMO methods, don't include it in your project! -->
        <script src="{{ asset('js/settings.js') }}"></script>
        <!-- JS para Datatables.net -->
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>
        <!-- Chart JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
        <script type="text/javascript" >
            var ctx2= document.getElementById("perdidaFuga").getContext("2d");
            Chart.defaults.global.defaultFontColor='white';
            Chart.defaults.global.legend.display = false;
            var perdidaFuga= new Chart(ctx2,{
                
                type:"line",
                data:{
                    labels:['En-Fb','Mr-Ab','My-Jn','Jl-Ag','Set-Oc','Nv-Dc'],
                    datasets:[{
                        borderColor:'white',
                        data:@if(isset($perdidas1))
                            [{{$perdidas1}},{{$perdidas2}},{{$perdidas3}},{{$perdidas4}},{{$perdidas5}},{{$perdidas6}}],
                        @else
                            [0,0,0,0,0,0,0,0,22,0],
                        @endif
                        
                            
                        lineTension: 0,
                        pointStyle:'circle',
                        backgroundColor:false,
                        color:'rgb(255, 255, 255)'
                        
                    }]
                },
                options: {
                    scales: {
                        xAxes: [{ 
                            gridLines: {
                                color:"rgba(255,255,255,0.2)" // <-- Color eje X
                            }
                            }],
                        yAxes: [{
                            ticks:{
                                beginAtZero:true
                            },
                            gridLines: {
                                color:"rgba(255,255,255,0.2)" // <-- Color eje Y
                                        },
                                }],
                        } 
                    }
                
            });
        </script>
        <script>
            var ctx1= document.getElementById("fugasDetectadas").getContext("2d");
            Chart.defaults.global.defaultFontColor='white';
            Chart.defaults.global.legend.display = false;
            var fugasDetectadas= new Chart(ctx1,{
                //type:"bar" x borderColor:'white',
                type:"line",
                data:{
                    labels:['En-F','Mr-A','M-Jn','Jl-Ag','S-Oc','Nv-D'],
                    datasets:[{
                        borderColor:'white',
                        data:
                        @if(isset($fugas1))
                            [{{$fugas1}},{{$fugas2}},{{$fugas3}},{{$fugas4}},{{$fugas5}},{{$fugas6}}],
                        @else
                            [0,0,0,0,0,0,0,0,0,0],
                        @endif
                        backgroundColor:[
                        'rgb(255, 255, 255)','rgb(255, 255, 255)',
                        'rgb(255, 255, 255)','rgb(255, 255, 255)',
                        'rgb(255, 255, 255)','rgb(255, 255, 255)','rgb(255, 255, 255)',
                        'rgb(255, 255, 255)','rgb(255, 255, 255)','rgb(255, 255, 255)',
                        'rgb(255, 255, 255)','rgb(255, 255, 255)','rgb(255, 255, 255)',
                        ],
                        color:'rgb(255, 255, 255)'
                    }]
                },
                options: {
                    scales: {
                        xAxes: [{ 
                            gridLines: {
                                color:"rgba(255,255,255,0.2)" // <-- Color eje X
                            }
                            }],
                        yAxes: [{
                            ticks:{
                                beginAtZero:true
                            },
                            gridLines: {
                                color:"rgba(255,255,255,0.2)" // <-- Color eje Y
                            },
                        }],
                    } 
                }
                
            });
        </script>
        <script>
            var ctx3= document.getElementById("lecturasRegistradas").getContext("2d");
            Chart.defaults.global.defaultFontColor='white';
            Chart.defaults.global.legend.display = false;
            var lecturasRegistradas= new Chart(ctx3,{
                
                type:"line",
                data:{
                    labels:['En-Fb','Mr-Ab','M-Jn','Jl-Ag','St-Oc','Nv-Dc'],
                    datasets:[{
                        borderColor:'white',
                        data:
                        @if(isset($incidentes1))
                            [{{$incidentes1}},{{$incidentes2}},{{$incidentes3}},{{$incidentes4}},{{$incidentes5}},{{$incidentes6}}],
                        @else
                            [0,0,0,0,0,0,0,0,0,0],
                        @endif
                        lineTension: 0,//linea recta
                        // borderDash: [10,5], //Linea punteada
                        backgroundColor:false,//Color debajo de la curva
                        color:'rgb(255, 255, 255)'
                        
                    }]
                },
                options: {
                    scales: {
                        xAxes: [{ 
                            gridLines: {
                                color:"rgba(255,255,255,0.2)" // <-- Color eje X
                            }
                            }],
                        yAxes: [{
                            ticks:{
                                beginAtZero:true
                            },
                            gridLines: {
                                color:"rgba(255,255,255,0.2)" // <-- Color eje Y
                            },
                        }],
                    } 
                }
                
            });
        </script>
        <script>
            $('#usuarios').DataTable({
                responsive: true,
                autoWidth: false,
                "language": {
            "lengthMenu": "Mostrar _MENU_ registro por pagina",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando la pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            'search':'Buscar:',
            'paginate':{
                'next':'Siguiente',
                'previous':'Anterior'
            }
        }
            });
            $('#lecturas').DataTable({
                responsive:true,
                autoWidth: false,
                "language": {
            "lengthMenu": "Mostrar _MENU_ registro por pagina",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando la pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            'search':'Buscar:',
            'paginate':{
                'next':'Siguiente',
                'previous':'Anterior'
            }
        }
            });
        </script>
        @stack('js')
    </body>
</html>