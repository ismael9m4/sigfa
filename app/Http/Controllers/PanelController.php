<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leakage;
use App\Models\Reading;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;
class PanelController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function prediccion(){
        predictor();
        
    }
    public function rendimiento(){
        $volumenNeto=CalculoVolumenNeto();
        $volumenPromedio=CalculoVolumenPromedio();
        $volumenNocturno=CalculoVolumenNocturno();
        return $volumenNeto;
    }
    public function index(){
        $volumenNeto=CalculoVolumenNeto();
        $volumenPromedio=CalculoVolumenPromedio();
        $volumenNocturno=calculoVolumenNocturno();
        $cantidadFugas=count(fugaexistio(sensores()));
        $prediccion=consultaConsumoDistrib();
        //dd(consultaConsumoDistribNeto());
        return view('controlpanel.index',compact('volumenNeto','volumenPromedio','volumenNocturno','cantidadFugas','prediccion',));
        //$respues=detection(8050239);
            //$respues=fugaexistio([8050237,2]);
            //dump($respues);
        //if(!consultaPresion()){
            //return view('controlpanel.index');
        //}
        //return predictor();
    }
    public function notificaciones(){
        $notifis= auth()->user()->notifications;
        return view('notifications.index',compact('notifis'));    
    }
    public function shownotificaciones($id){
        $notifis=auth()->user()->notifications()->find($id);
        return view('notifications.show',compact('notifis'));
    }
    
}
