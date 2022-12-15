<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $sensores=cantidadS();
        $sensoresd=cantidadSD();
        $incidentes=cantidadI();
        $detecciones=cantidadD();
        $users=cantidadU();
        //dump(graficoPeriodo(01,02));
        $incidentes1=graficoPeriodoL(1,2);
        $incidentes2=graficoPeriodoL(3,4);
        $incidentes3=graficoPeriodoL(5,6);
        $incidentes4=graficoPeriodoL(7,8);
        $incidentes5=graficoPeriodoL(9,10);
        $incidentes6=graficoPeriodoL(11,12);
        $perdidas1=graficoPeriodoP(1,2);
        $perdidas2=graficoPeriodoP(3,4);
        $perdidas3=graficoPeriodoP(5,6);
        $perdidas4=graficoPeriodoP(7,8);
        $perdidas5=graficoPeriodoP(9,10);
        $perdidas6=graficoPeriodoP(11,12);
        $fugas1=graficoPeriodoF(1,2);
        $fugas2=graficoPeriodoF(3,4);
        $fugas3=graficoPeriodoF(5,6);
        $fugas4=graficoPeriodoF(7,8);
        $fugas5=graficoPeriodoF(9,10);
        $fugas6=graficoPeriodoF(11,12);
        $usersmy=usuarioMenosYo();
        $zonas=zonas();
        $nivel=nivelzonariesgo();
        $variacion=variacionD();
        $i=0;
        return view('home',compact('sensores','sensoresd','incidentes','detecciones','users',
        'perdidas1','perdidas2','perdidas3','perdidas4','perdidas5','perdidas6','incidentes1','incidentes2','incidentes3','incidentes4'
        ,'incidentes5','incidentes6','fugas1','fugas2','fugas3','fugas4','fugas5','i','fugas6','usersmy','zonas','nivel','variacion',
        ));
        //return view('home',['abonos'=>$abonos]);
    }

    public function generarPdf(){
        $usersAdmin=usuariosAdmin();
        $usersnoAdmin=usuariosNoAdmin();
        $zonas=zonas();
        $totalfugasreales="";
        $totalfugasdetec="";
        $volnetR="";
        $volpromT="";
        $volNetR="";
        //Grafico 1 de Prueba para informe: BARRA
        $chartData = [
            "type" => 'horizontalBar',
              "data" => [
                "labels" => mesesLecturas(),
                  "datasets" => [
                    [
                      "label" => "Lecturas", 
                      "data" => cantidadLectura(),
                      "backgroundColor" => ['#27ae60', '#f1c40f', '#e74c3c']
                    ], 
                  ],
                ],
                "options" => [
                    "plugins" =>[
                        "legend"=>[
                          "display" => false,
                        ]
                    ]
                ]
            ]; 
        //Grafico 2 de Prueba para informe      
        $chartData2 = [
          "type" => 'pie',
            "data" => [
              "labels" => arrayTipoSensor(),
                "datasets" => [
                  [
                    "label" => "Sensores", 
                    "data" => cantidadTipoSensor(),
                    "backgroundColor" => ['#27ae60', '#f1c40f', '#e74c3c']
                  ], 
                ],
              ]
          ]; 
        $chartData3 = [
            "type" => 'pie',
            "data" => [
              "labels" => arrayTipoFuga(),
                "datasets" => [
                  [
                    "label" => "Fugas", 
                    "data" => cantidadTipoFuga(),
                    "backgroundColor" => ['#27ae60', '#f1c40f', '#e74c3c']
                  ], 
                ],
              ]
            ]; 
        $chartData = json_encode($chartData);
        $chartURL = "https://quickchart.io/chart?width=300&height=200&c=".urlencode($chartData);
        $chartData = file_get_contents($chartURL); 
        $chart = 'data:image/png;base64, '.base64_encode($chartData);
        //
        $chartData2 = json_encode($chartData2);
        $chartURL2 = "https://quickchart.io/chart?width=300&height=200&c=".urlencode($chartData2);
        $chartData2 = file_get_contents($chartURL2); 
        $chart2 = 'data:image/png;base64, '.base64_encode($chartData2);
        //
        $chartData3 = json_encode($chartData3);
        $chartURL3 = "https://quickchart.io/chart?width=300&height=200&c=".urlencode($chartData3);
        $chartData3 = file_get_contents($chartURL3); 
        $chart3 = 'data:image/png;base64, '.base64_encode($chartData3);
        $volumenPromedio=CalculoVolumenPromedio();
        $volumenNocturno=calculoVolumenNocturno();
        $cantDetAñoActual=cantdeteccionAñoActual();
        $cantfugaAñoActual= cantfugaAñoActual();
        PDF::setOptions(['dpi'=>'150','defaultFont'=>'sans-serif','enable-javascript'=>true, 'javascript-delay'=> 13500,'enable-smart-shrinking'=> true, 'no-stop-slow-scripts'=> true]);
        $pdf=PDF::loadView('reporte.pdf',['grafico'=>$chart,'grafico2'=>$chart2, 'grafico3'=>$chart3,'usersmyNA'=>$usersAdmin, 'usersmyA'=>$usersnoAdmin, 'zonas'=>$zonas,'volumenNocturno'=> $volumenNocturno, 'volumenPromedio'=>$volumenPromedio,'cantDetAñoActual'=>$cantDetAñoActual,'cantfugaAñoActual'=>$cantfugaAñoActual])->setPaper('a4', 'portrait');
        //$pdf->loadHTML('<h1>Title</h1>');


        return $pdf->stream();
        //return view('reporte.pdf',compact('usersmy'));
    }
}
