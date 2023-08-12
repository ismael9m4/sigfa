<?php
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Models\Leakage;
use App\Models\Reading;
use App\Models\Sensor;
use App\Models\User;
use App\Models\Detection;
use App\Models\Pipeline;
use App\Models\Incident;
use Illuminate\Support\Arr;
use App\Notifications\DetectNotification;

function getIdSensores(){//Funcionando y usandose
    $sensores= Sensor::select("id")->distinct()->get();
    if($sensores != null){
        return $sensores;
    }else{
        return false;
    }
    
}
function variacionCaudalDiurno($sensoresId){//Funcionando y usandose
    //$sensores_con_fuga=[];
    $sensores_con_fuga=0;
    try{
        $diferencia = DB::table('readings')
        ->select(DB::raw('(SELECT readings.value FROM readings WHERE (readings.unit = "L/min") AND (readings.fk_sensor = '.$sensoresId.') ORDER BY readings.created_at DESC LIMIT 1) - (SELECT readings.value FROM readings WHERE (readings.unit = "L/min") AND (readings.fk_sensor = '.$sensoresId.') ORDER BY created_at DESC LIMIT 1,1) AS diferencia'))
        ->value('diferencia');
            if(abs($diferencia)>1.10){
                //$sensores_con_fuga = Arr::add($sensores_con_fuga,'id',$id);
                return 30;
            }else{
                return 0;//No se detecto variaciones
            }            
    }catch(Throwable $e){
        return "Hay un grave error SQL en Caudal Diurno";
    }  
}
function variacionCaudalNocturno($sensoresId){//Funcionando y usandose
    try{
        $diferencia = DB::table('readings')
        ->select(DB::raw('(SELECT readings.value FROM readings WHERE (TIME(readings.created_at) BETWEEN "00:01:00" AND "03:00:00") AND (readings.unit = "L/min") AND (readings.fk_sensor = '.$sensoresId.') ORDER BY readings.created_at DESC LIMIT 1) - (SELECT readings.value FROM readings WHERE (TIME(readings.created_at) BETWEEN "00:01:00" AND "03:00:00") AND (readings.unit = "L/min") AND (readings.fk_sensor = '.$sensoresId.') ORDER BY created_at DESC LIMIT 1,1) AS diferencia'))
        ->value('diferencia');
            if(abs($diferencia)>0.1){
                return 20;
            }else{
                return 0;//No se detecto variaciones
            }            
    }catch(Throwable $e){
        return "Hay un grave error SQL en Caudal Nocturno";
    }  
}
function variaciondePresion($sensoresId){//Funcionando y usandose
    try{
        $diferencia = DB::table('readings')
        ->select(DB::raw('(SELECT readings.value FROM readings WHERE 
        (readings.unit = "kPa") AND (readings.fk_sensor = '.$sensoresId.') 
        ORDER BY readings.created_at DESC LIMIT 1) - (SELECT readings.value 
        FROM readings WHERE (readings.unit = "kPa") AND (readings.fk_sensor = '.$sensoresId.') 
        ORDER BY created_at DESC LIMIT 1,1) AS diferencia'))
        ->value('diferencia');
            if(abs($diferencia)>0.01){
                return 20;
            }else{
                return 0;//No se detecto variaciones
            }            
    }catch(Throwable $e){
        return "Hay un grave error SQL en Presion";
    } 
}
function variaciondeValvula($sensoresId){//Funcionando y usandose
    try{
        $diferencia = DB::table('readings')
        ->select(DB::raw('(SELECT readings.value FROM readings WHERE 
        (readings.unit = "Vuelta") AND (readings.fk_sensor = '.$sensoresId.') 
        ORDER BY readings.created_at DESC LIMIT 1) - (SELECT readings.value 
        FROM readings WHERE (readings.unit = "Vuelta") AND (readings.fk_sensor = '.$sensoresId.') 
        ORDER BY created_at DESC LIMIT 1,1) AS diferencia'))
        ->value('diferencia');
            if(abs($diferencia)>0.01){
                return 20;
            }else{
                return 0;//No se detecto variaciones
            }            
    }catch(Throwable $e){
        return "Hay un grave error SQL en Valvula";
    } 
}
function antecedentes($sensoresId){
    try{
        $resultado = DB::table('sensors')
        ->join('devices', 'sensors.fk_device', '=', 'devices.id')
        ->join('pipelines', 'devices.fk_pipeline', '=', 'pipelines.id')
        ->join('leakages', 'pipelines.id', '=', 'leakages.fk_pipeline')
        ->select('sensors.id')
        ->where('sensors.id', $sensoresId)
        ->get();
            if(count($resultado)>0){
                return 10;
            }else{
                return 0;//No se encontro antecedentes
            }            
    }catch(Throwable $e){
        return "Hay un grave error SQL en Antecedentes";
    } 
}
function test2(){
    $sensores=getIdSensores();//Devuelve los id de todo los sensores
    //$resultado = Arr::get($array_sensores_con_variacion_caudal,'id');
    $total=variacionCaudalDiurno('"8050238"')+variacionCaudalNocturno('"8050238"')+variaciondePresion('"8050239"')+variaciondeValvula('"8050240"')+antecedentes("8050238");
    if($total >70){
        
        //Crear registro de deteccion
        $hoy = Carbon::today();
        Detection::create([
            'cause' => "Deteccion por calculo de Sistema Informatico",
            'id_sensor' => "8050238",
            'neighborhood' => "S. S. de Jujuy",
            'created_at'=> $hoy,
            'positiong' => "",
            'variacionpresion' =>"",
            'variacionvalvula' =>"",
            'id_device' =>"8050237"
        ]);
        return 1;
    }else{
        return 0;
    }
    
}
function test3(){
    $sensores=getIdSensores();//Devuelve los id de todo los sensores
    //$resultado = Arr::get($array_sensores_con_variacion_caudal,'id');
    $total=variacionCaudalDiurno('"8050238"')+variacionCaudalNocturno('"8050238"')+variaciondePresion('"8050239"')+variaciondeValvula('"8050240"')+antecedentes("8050238");
    if($total >70){
        return 1;
    }else{
        return 0;
    }
    
}
function test4(){
    //Crear registro de deteccion
    $hoy = Carbon::now();
    Detection::create([
        'cause' => "Deteccion por calculo de Sistema Informatico",
        'id_sensor' => "8050238",
        'neighborhood' => "S. S. de Jujuy",
        'created_at'=> $hoy,
        'positiong' => "",
        'variacionpresion' =>"",
        'variacionvalvula' =>"",
        'id_device' =>"8050237"
    ]);
}
function test5(){
    //Crear registro de prediccion
    $hoy = Carbon::now();
     // Ejecutar la sentencia SQL con Auth::id()
     $usuario = Auth::user()->name;
     if(consultaConsumoDistrib()===false){
        DB::statement("INSERT INTO predictions (username, probability, fk_pipeline, created_at) VALUES ('$usuario', '10%','1', '$hoy')");
     }else{
        $calculo=consultaConsumoDistrib();
        DB::statement("INSERT INTO predictions (username, probability, fk_pipeline, created_at) VALUES ('$usuario', '$calculo','1', '$hoy')");
     }
     
}
function estadoValvula(){
    $sensor = Sensor::where('id', 8050240)->value('state');
    return $sensor;
}
////Pruebita
function test(){
    //1-Obtener todos los Id de todos sensores [en array]
    //2-Calcular de c/sensor la variacion de caudal diurno
    //3-Calcular de c/sensor la variacion de caudal nocturno
    //4-Calcular de lecturas la variacion de presion
    //5-Calcular de lecturas la variacion de valvula
    //6-Calcular antecedentes de los id sensores
    $hoy = Carbon::today();
    $lecturas=DB::table('sensors')
            ->join('devices', 'sensors.fk_device', '=', 'devices.id')
            ->join('readings', 'readings.fk_sensor', '=', 'sensors.id')
            ->join('pipelines', 'devices.fk_pipeline', '=', 'pipelines.id')
            ->select('readings.id', 'readings.date', 'readings.value','readings.unit','readings.date','devices.id as serie','sensors.type'
            ,'pipelines.neighborhood','pipelines.district')
            ->orderBy('readings.created_at', 'desc')
            ->limit(24)
            ->where('sensors.type', 'Consumo')
            ->whereDate('date', '=', $hoy)
            ->get();
    $diferencia = DB::table('sensors')
    ->join('devices', 'sensors.fk_device', '=', 'devices.id')
    ->join('readings', 'readings.fk_sensor', '=', 'sensors.id')
    ->join('pipelines', 'devices.fk_pipeline', '=', 'pipelines.id')
    ->select(DB::raw('(SELECT readings.value FROM readings ORDER BY readings.created_at DESC LIMIT 1) - (SELECT readings.value FROM readings ORDER BY created_at DESC LIMIT 1,1) AS diferencia'))
    ->value('diferencia');
    return $diferencia-1;
}
function predictor(){
    try {
    $probabilidadHoy=0;
    $hoy = Carbon::today();
    //$yesterday = Carbon::yesterday();
    $ayer=Carbon::now()->add(-1, 'day')->format('Y-m-d');
    $lecturas=DB::table('sensors')
            ->join('devices', 'sensors.fk_device', '=', 'devices.id')
            ->join('readings', 'readings.fk_sensor', '=', 'sensors.id')
            ->join('pipelines', 'devices.fk_pipeline', '=', 'pipelines.id')
            ->select('readings.id', 'readings.date', 'readings.value','readings.unit','readings.date','devices.id as serie','sensors.type'
            ,'pipelines.neighborhood','pipelines.district')
            ->orderBy('readings.id', 'desc')
            ->limit(24)
            ->where('sensors.type', 'Consumo')
            ->where('pipelines.neighborhood', 'VILLA JARDIN DE REYES')
            ->where('district', 'A - Las Peras')
            ->whereDate('date', '=', $hoy)
            ->get();
    $lecturasNocturnas=DB::table('sensors')
            ->join('devices', 'sensors.fk_device', '=', 'devices.id')
            ->join('readings', 'readings.fk_sensor', '=', 'sensors.id')
            ->join('pipelines', 'devices.fk_pipeline', '=', 'pipelines.id')
            ->select('readings.id', 'readings.date','readings.hour', 'readings.value','readings.unit','readings.date','devices.id as serie','sensors.type'
            ,'pipelines.neighborhood','pipelines.district')
            ->orderBy('readings.id', 'desc')
            ->limit(24)
            ->where('sensors.type', 'Consumo')
            ->where('pipelines.neighborhood', 'VILLA JARDIN DE REYES')
            ->where('district', 'A - Las Peras')
            ->whereTime('hour', '>', '20:00:00')
            ->whereTime('hour', '<' ,'23:59:59')
            ->whereDate('date', '=', $hoy)
            ->get();
    $lecturasAyer=DB::table('sensors')
            ->join('devices', 'sensors.fk_device', '=', 'devices.id')
            ->join('readings', 'readings.fk_sensor', '=', 'sensors.id')
            ->join('pipelines', 'devices.fk_pipeline', '=', 'pipelines.id')
            ->select('readings.id', 'readings.date', 'readings.value','readings.unit','readings.date','devices.id as serie','sensors.type'
            ,'pipelines.neighborhood','pipelines.district')
            ->orderBy('readings.id', 'desc')
            ->limit(24)
            ->where('sensors.type', 'Consumo')
            ->where('pipelines.neighborhood', 'VILLA JARDIN DE REYES')
            ->where('district', 'A - Las Peras')
            ->whereDate('date', '=', $ayer)
            ->get();
    $lecturasNocturnasAyer=DB::table('sensors')
            ->join('devices', 'sensors.fk_device', '=', 'devices.id')
            ->join('readings', 'readings.fk_sensor', '=', 'sensors.id')
            ->join('pipelines', 'devices.fk_pipeline', '=', 'pipelines.id')
            ->select('readings.id', 'readings.date','readings.hour', 'readings.value','readings.unit','readings.date','devices.id as serie','sensors.type'
            ,'pipelines.neighborhood','pipelines.district')
            ->orderBy('readings.id', 'desc')
            ->limit(24)
            ->where('sensors.type', 'Consumo')
            ->where('pipelines.neighborhood', 'VILLA JARDIN DE REYES')
            ->where('district', 'A - Las Peras')
            ->whereTime('hour', '>', '20:00:00')
            ->whereTime('hour', '<' ,'23:59:59')
            ->whereDate('date', '=', $ayer)
            ->get();
            if($lecturas!=null){
                
                foreach ($lecturas as $lectura) {
                    $consumo[]=floatval($lectura->value);
                }
                if($lecturasNocturnas!=null && !empty($lecturasNocturnas)){
                    foreach ($lecturasNocturnas as $lecturan) {
                        $consumon[]=floatval($lecturan->value);
                    }
                    $consumoMinimoNocturnoHoy=min($consumon);
                }
                $consumoTotalHoy=array_sum($consumo);
                $consumoMedioHoy=array_sum($consumo)/count($consumo);
                $consumoHorarioMaximoHoy=max($consumo);

                if($lecturasAyer!=null){
                    foreach ($lecturasAyer as $lecturay) {
                        $consumoAyer[]=floatval($lecturay->value);
                    }
                if($lecturasNocturnasAyer!=null && !empty($lecturasNocturnasAyer)){
                        foreach ($lecturasNocturnasAyer as $lecturayn) {
                            $consumoAyern[]=floatval($lecturayn->value);
                        }
                        $consumoMinimoNocturnoAyer=min($consumoAyern);
                }
                $consumoTotalAyer=array_sum($consumoAyer);
                $consumoMedioAyer=array_sum($consumoAyer)/count($consumoAyer);
                $consumoHorarioMaximoAyer=max($consumoAyer);
                }

                if(abs($consumoTotalAyer-$consumoTotalHoy)>0.25){
                    $probabilidadHoy=+0.25;
                    if(abs($consumoMedioAyer-$consumoMedioHoy)>0.25){
                        $probabilidadHoy=+0.25;
                        if(abs($consumoHorarioMaximoAyer-$consumoHorarioMaximoHoy)>0.25){
                            $probabilidadHoy=+0.25;
                            if(abs($consumoMinimoNocturnoHoy-$consumoMinimoNocturnoAyer)>0.25){
                                $probabilidadHoy=+0.25;
                            }
                        }
                    }
                }
            return $probabilidadHoy;
            }else{
                return "0";
            }
    } catch (Throwable $e) {
            report($e);
            return "Ha ocurrido un error";
        }
    
}
function existefuga($presion,$id1,$giro,$id2){
    $idpresion=calcularpresion($presion,$id1);
    $idgiro=calculargiro($giro,$id2);
    $idpipeline = [];
    if((!$idpresion)&&(!$idgiro)){
        return false;
    }else{
        //Crear registro de Fuga
        $lecturas=DB::table('sensors')
        ->join('devices', 'sensors.fk_device', '=', 'devices.id')
        ->join('readings', 'readings.fk_sensor', '=', 'sensors.id')
        ->join('devices', 'devices.fk_pipeline', '=', 'pipelines.id')
        ->select('pipelines.id')
        ->where('readings.id', $idpresion)
        ->get();
        if($lecturas!=null){
            foreach ($lecturas as $lectura) {
                $idpipeline=intval($lectura->id);
            }
        }
        date_default_timezone_set('America/Argentina/Jujuy');
        Leakage::create(
        +[
            'stimad_less'=>750,
            'datetime'=>$t = date("Y-m-d H:i:s"),
            'cause'=>"Desconocido",
            'details'=>"Sin detalles",
            'fk_category'=>1,
            'fk_pipeline'=>$idpipeline[0],
        ]);
        return "Lo hicimos!!!";
    }
}
function detector(){
    try {
        $hoy = Carbon::today();
        $presiones=DB::table('sensors')
            //->join('devices', 'sensors.fk_device', '=', 'devices.id') //'devices.id as serie'
            ->join('readings', 'readings.fk_sensor', '=', 'sensors.id')
            ->join('pipelines', 'devices.fk_pipeline', '=', 'pipelines.id')
            ->select('readings.id', 'readings.date', 'readings.value','readings.unit','readings.date','sensors.type'
            ,'pipelines.neighborhood','pipelines.district')
            ->orderBy('readings.id', 'desc')
            ->limit(24)
            ->where('sensors.type', 'Presion')
            ->where('pipelines.neighborhood', 'VILLA JARDIN DE REYES')
            ->where('district', 'A - Las Peras')
            ->whereDate('date', '=', $hoy)
            ->get();
            $giros=DB::table('sensors')
            //->join('devices', 'sensors.fk_device', '=', 'devices.id')
            ->join('readings', 'readings.fk_sensor', '=', 'sensors.id')
            ->join('pipelines', 'devices.fk_pipeline', '=', 'pipelines.id')
            ->select('readings.id', 'readings.date', 'readings.value','readings.unit','readings.date','sensors.type'
            ,'pipelines.neighborhood','pipelines.district')
            ->orderBy('readings.id', 'desc')
            ->limit(24)
            ->where('sensors.type', 'GiroValvula')
            ->where('pipelines.neighborhood', 'VILLA JARDIN DE REYES')
            ->where('district', 'A - Las Peras')
            ->whereDate('date', '=', $hoy)
            ->get();
            $indicador=0;
            $presion = [];
            $giro = [];
            $identificador1 = [];
            $identificador2 = [];
            if($presiones!=null){
                foreach ($presiones as $lectura) {
                    $presion[]=floatval($lectura->value);
                    $identificador1[]=floatval($lectura->id);
                }
            }
            
            if($giros!=null){
                foreach ($giros as $lectura) {
                    $giro[]=floatval($lectura->value);
                    $identificador2[]=floatval($lectura->id);
                }
            }
        return existefuga($presion,$identificador1,$giro,$identificador2);
    } catch (Throwable $e) {
        report($e);
        return "$e";
    }
}

    function calculoVolumenNeto(){
        try{
            $hoy = Carbon::today();//->addYears(1);
            $hoy2 = Carbon::now()->toDateString();
            $semanapasada = Carbon::today()->subWeek(1);
            $promedio1 = Reading::where('unit', 'L/min')
            ->whereDate('date', '=', $hoy)->avg('value');
            $promedio2 = Reading::where('unit', 'L/min')
            ->whereDate('date', '=', $semanapasada)->avg('value');
            $fechaLimite = Carbon::today()->subDays(14)->format('Y-m-d');
            $full = Reading::where('unit', 'L/min')
                ->whereNotNull('value')
                ->where('value', '<>', 0)
                ->whereDate('created_at', '>=', $fechaLimite)
                ->where(function ($query) {
                    $query->whereTime('created_at', '>=', '00:00:00')
                        ->whereTime('created_at', '<=', '23:59:59');
                })
                ->avg('value');
            if(($promedio1==null) || $promedio2==null){
                return $full;
            }
            $promedioNeto1=$promedio1*60*24;//Volumen Distribuido aprox en Litros
            $promedioNeto2=$promedio2*60*24;
            $diferencia=abs($promedioNeto1-$promedioNeto2);
            return $diferencia;
        }catch(Throwable $e){

        }
    }
    function calculoVolumenPromedio(){
            try{
                $hoy = Carbon::today();//->addYears(1);
                $hoy2 = Carbon::now()->toDateString();
                $semanapasada = Carbon::today()->subWeek(1);
                $promedio1 = DB::table('readings')
                ->selectRaw('AVG(value) as average_value')
                ->where('unit', 'L/min')
                ->whereBetween(DB::raw('TIME(created_at)'), ['06:00:00', '20:59:00'])
                ->get();
            
                $promedio2 = Reading::where('unit', 'L/min')
                ->whereDate('date', '=', $semanapasada)->avg('value');
                
                $fechaLimite = Carbon::today()->subDays(14)->format('Y-m-d');
                $diurno = Reading::where('unit', 'L/min')
                    ->whereNotNull('value')
                    ->where('value', '<>', 0)
                    ->whereDate('created_at', '>=', $fechaLimite)
                    ->where(function ($query) {
                        $query->whereTime('created_at', '>=', '06:00:00')
                            ->whereTime('created_at', '<=', '20:59:59');
                    })
                    ->avg('value');

                if(($promedio1[0]->average_value==null) || $promedio2==null){
                    //return $promedio1[0]->average_value;
                    return $diurno;
                }
                $promedioMedio1=$promedio1*60*1;
                $promedioMedio2=$promedio2*60*1;
                $diferencia=abs($promedioMedio1-$promedioMedio2);
                return 0;
            }catch(Throwable $e){
    
            }
    }
    function calculoVolumenNocturno(){
        try{
            $hoy = Carbon::today();//->addYears(1);
            $hoy2 = Carbon::now()->toDateString();
            $semanapasada = Carbon::today()->subWeek(1);
            $promedio1 = Reading::where('unit', 'L/min')
            ->whereDate('date', '=', $hoy)
            ->whereTime('hour', '>', '20:00:00')
            ->whereTime('hour', '<' ,'23:59:59')
            ->avg('value');
            $promedio2 = Reading::where('unit', 'L/min')
            ->whereDate('date', '=', $semanapasada)
            ->whereTime('hour', '>', '20:00:00')
            ->whereTime('hour', '<' ,'23:59:59')
            ->avg('value');
            $fechaLimite = Carbon::today()->subDays(14)->format('Y-m-d');
            $nocturno1 = Reading::where('unit', 'L/min')
                ->whereNotNull('value')
                ->where('value', '<>', 0)
                ->whereDate('created_at', '>=', $fechaLimite)
                ->where(function ($query) {
                    $query->whereTime('created_at', '>=', '00:00:00')
                        ->whereTime('created_at', '<=', '03:59:59');
                })
                ->avg('value');
            $nocturno2 = Reading::where('unit', 'L/min')
                    ->whereNotNull('value')
                    ->where('value', '<>', 0)
                    ->whereDate('created_at', '>=', $fechaLimite)
                    ->where(function ($query) {
                        $query->whereTime('created_at', '>=', '21:00:00')
                            ->whereTime('created_at', '<=', '23:59:59');
                    })
                    ->avg('value');
            if(($promedio1==null) || $promedio2==null){
                return ($nocturno1+$nocturno2)/2;
            }
            $promedioNoct1=$promedio1*60*4;//Volumen Distribuido en la Noche aprox en Litros
            $promedioNoct2=$promedio2*60*4;
            $diferencia=abs($promedioNoct1-$promedioNoct2);
            return $diferencia+50;
        }catch(Throwable $e){

        }
    }
    function consultaPresion($id){
        try{
            $hoy = Carbon::today();//->addYears(1);
            $semanapasada = Carbon::today()->subWeek(1);
            $promedio1 = Reading::where('unit', 'kPa')
            ->where('fk_sensor','=',$id)
            ->whereDate('date', '=', $hoy)->avg('value');
            $promedio2 = Reading::where('unit', 'kPa')
            ->where('fk_sensor','=',$id)
            ->whereDate('date', '=', $semanapasada)->avg('value');
            if(($promedio1==null) || $promedio2==null){
                return false;
            }
            $diferencia=abs($promedio1-$promedio2);
            if($diferencia>0.5){
                return true;
            }else{
                return false;
            }    
        }catch (Throwable $e){
        }
        
    }
    function consultaValvula(){
        try{
            $hoy = Carbon::today();//->addYears(1);
            $semanapasada = Carbon::today()->subWeek(1);
            $promedio1 = Reading::where('unit', 'Vuelta')
            //->where('fk_sensor','=',$id)
            ->whereDate('date', '=', $hoy)->avg('value');
            $promedio2 = Reading::where('unit', 'Vuelta')
            //->where('fk_sensor','=',$id)
            ->whereDate('date', '=', $semanapasada)->avg('value');
            if(($promedio1==null) || $promedio2==null){
                return false;
            }
            $diferencia=abs($promedio1-$promedio2);
            if($diferencia>0.2){
                return true;
            }else{
                return false;
            }   
        }catch (Throwable $e){
        }
        
    }
    function consultaConsumoDistribPromedio(){
        try{
            $hoy = Carbon::today();//->addYears(1);
            $semanapasada = Carbon::today()->subWeek(1);
            $promedio1 = Reading::where('unit', 'L/min')
            ->whereDate('date', '=', $hoy)->avg('value');
            $promedio2 = Reading::where('unit', 'L/min')
            ->whereDate('date', '=', $semanapasada)->avg('value');
            if(($promedio1==null) || $promedio2==null){
                return false;
            }
            $promedioMedio1=$promedio1*60*1;
            $promedioMedio2=$promedio2*60*1;
            $diferencia=abs($promedioMedio1-$promedioMedio2);
            if($diferencia>0.5){
                return true;
            }else{
                return false;
            }
            }catch (Throwable $e){
            }
    }
    function consultaConsumoDistribNeto(){
        try{
            $hoy = Carbon::today();//->addYears(1);
            $semanapasada = Carbon::today()->subWeek(1);
            $promedio1 = Reading::where('unit', 'L/min')
            ->whereDate('date', '=', $hoy)->avg('value');
            $promedio2 = Reading::where('unit', 'L/min')
            ->whereDate('date', '=', $semanapasada)->avg('value');
            if(($promedio1==null) || $promedio2==null){
                return false;
            }
            $promedioNeto1=$promedio1*60*24;//Volumen Distribuido aprox en Litros
            $promedioNeto2=$promedio2*60*24;
            $diferencia=abs($promedioNeto1-$promedioNeto2);
            if($diferencia>0.5){
                return true;
            }else{
                return false;
            }
            }catch (Throwable $e){
            }
    }
    function consultaConsumoDistribNocturno(){
        try{
            $hoy = Carbon::today();//->addYears(1);
            $semanapasada = Carbon::today()->subWeek(1);
            $promedio1 = Reading::where('unit', 'L/min')
            ->whereDate('date', '=', $hoy)
            ->whereTime('hour', '>', '20:00:00')
            ->whereTime('hour', '<' ,'23:59:59')
            ->avg('value');
            $promedio2 = Reading::where('unit', 'L/min')
            ->whereDate('date', '=', $semanapasada)
            ->whereTime('hour', '>', '20:00:00')
            ->whereTime('hour', '<' ,'23:59:59')
            ->avg('value');
            if(($promedio1==null) || $promedio2==null){
                return false;
            }
            $promedioNoct1=$promedio1*60*4;//Volumen Distribuido en la Noche aprox en Litros
            $promedioNoct2=$promedio2*60*4;
            $diferencia=abs($promedioNoct1-$promedioNoct2);
            if($diferencia>0.5){
                return true;
            }else{
                return false;
            }
            }catch (Throwable $e){
            }
    }
    function consultaConsumoDistrib(){
        if(consultaConsumoDistribPromedio() && consultaConsumoDistribNeto() && consultaConsumoDistribNocturno()){
            return 0.75;
        }else{
            if(consultaConsumoDistribPromedio() && (consultaConsumoDistribNeto() || consultaConsumoDistribNocturno())){
                return 0.5;
            }else{
                if(consultaConsumoDistribPromedio() ||  consultaConsumoDistribNeto() || consultaConsumoDistribNocturno()){
                    return 0.25;
                }else{
                    return false;
                }
            }
            
        }
    }
    function detection($id){
        if(consultaPresion($id) && consultaValvula()){
            return true;
        }else{
            return false;
        }
    }
    function prediction(){
        //Consumo Neto
        //Consumo Nocturno
        //Consumo Medio
        //Consumo Maximo
    }
    function sensores(){
        //Buscare los sensores existentes y luego las usare para consultar presiones y giros de valvula
        $sensores= Sensor::select("id")->distinct()->get();
        //$contador=Sensor::select("id")->distinct()->count();
        $sensoresconfuga=[];
        foreach($sensores as $sensor => $id){
            //Consultar con el sensor la existencia de fugas en Eloquent con llave foranea
            if(detection($id->id)){
                $sensoresconfuga = Arr::add($sensoresconfuga,'id',$id);
                //dd($id->id);       
            }
            //$sensoresconfuga = Arr::add($sensoresconfuga,'id','8050239');
        }
        //dd($sensoresconfuga);
        return $sensoresconfuga;
    }
    function fugaexistio($sensores){
        $sensorscnfuga=[];
         //Comparar esa ubicacion con la de las fugas existentes
        $ubicacionf=DB::table('leakages')
        ->join('pipelines', 'leakages.fk_pipeline', '=', 'pipelines.id')->select('pipelines.positiong')
        ->distinct()->get();
        foreach($sensores as $sensor => $id){
            //Obtner la ubicacion del sensor
            $ubicacions=DB::table('sensors')
            ->join('devices', 'sensors.fk_device', '=', 'devices.id') 
            ->join('pipelines', 'devices.fk_pipeline', '=', 'pipelines.id')->select('pipelines.positiong')
            ->where('sensors.id','=',$id)->distinct()->get();
            if($ubicacionf==null){
                return "No existe fugas previas";
            }else{
                foreach($ubicacionf as $ubicacion => $ubicacionid){
                    if($ubicacionid!=$ubicacions){
                        $sensorscnfuga= Arr::add($sensorscnfuga,'id',$id);
                    }
                }
            }
        }
        return $sensorscnfuga;
    }
    function getDevice($id){
        $device=DB::table('sensors')
        ->join('devices', 'sensors.fk_device', '=', 'devices.id') 
        ->join('pipelines', 'devices.fk_pipeline', '=', 'pipelines.id')->select('sensors.fk_device')
        ->where('sensors.id','=',$id)->distinct()->first();
        return $device->fk_device;
    }
    function getUbicacion($id){
        $device=DB::table('sensors')
        ->join('devices', 'sensors.fk_device', '=', 'devices.id') 
        ->join('pipelines', 'devices.fk_pipeline', '=', 'pipelines.id')->select('pipelines.positiong')
        ->where('sensors.id','=',$id)->distinct()->first();
        return $device->positiong;
    }
    function getBarrio($id){
        $device=DB::table('sensors')
        ->join('devices', 'sensors.fk_device', '=', 'devices.id') 
        ->join('pipelines', 'devices.fk_pipeline', '=', 'pipelines.id')->select('pipelines.neighborhood')
        ->where('sensors.id','=',$id)->distinct()->first();
        return $device->neighborhood;
    }
    function variacionValvula(){
        try{
            $hoy = Carbon::today();//->addYears(1);
            $semanapasada = Carbon::today()->subWeek(1);
            $promedio1 = Reading::where('unit', 'Vuelta')
            //->where('fk_sensor','=',$id)
            ->whereDate('date', '=', $hoy)->avg('value');
            $promedio2 = Reading::where('unit', 'Vuelta')
            //->where('fk_sensor','=',$id)
            ->whereDate('date', '=', $semanapasada)->avg('value');
            if(($promedio1==null) || $promedio2==null){
                return false;
            }else{
                $diferencia=abs($promedio1-$promedio2);
                return $diferencia;
            }
        }catch(Throwable $e){
        }
    }
    function variacionPresion($id){
        try{
            $hoy = Carbon::today();//->addYears(1);
            $semanapasada = Carbon::today()->subWeek(1);
            $promedio1 = Reading::where('unit', 'kPa')
            ->where('fk_sensor','=',$id)
            ->whereDate('date', '=', $hoy)->avg('value');
            $promedio2 = Reading::where('unit', 'kPa')
            ->where('fk_sensor','=',$id)
            ->whereDate('date', '=', $semanapasada)->avg('value');
            if(($promedio1==null) || $promedio2==null){
                return false;
            }else{
                $diferencia=abs($promedio1-$promedio2);
                return $diferencia;
            }
        }catch(Throwable $e){
        }
    }
    function anioActual(){
        $anio=Carbon::now()->format('Y');
        return $anio;
    }
    function cantidadS(){
        $sensores=count(Sensor::all());
        return $sensores;
    }
    function cantidadSD(){
        $sensores=count(Sensor::where('state', 'Funcionando')->get());
        return $sensores;
    }
    function cantidadI(){
        //$incidentes=count(Leakage::all());
        $fugas=count(Leakage::where('removed', '0')->get());
        return $fugas;
    }
    function cantidadD(){
        $deteccion=count(Detection::all());
        return $deteccion;
    }
    function variacionD(){//Calcula la variacion entre las ultimas lecturas 
        try{
            $deteccion=0;
            $valor_p='';
            $id_ultimo=DB::table('readings')
            ->select('readings.id')->latest('id')->first();
                //$id_ultimo=floatval($id_ultimo);
            $valor_penultimo=DB::table('readings')->select('readings.value')->where('readings.id','=',$id_ultimo->id-1)->get(['value']);
            $valor_ultimo=DB::table('readings')
            ->select('readings.value')->latest('id')->first();
            if($valor_penultimo!=null){
                foreach ($valor_penultimo as $lectura) {
                    $valor_p=$lectura->value;
                }
            }
            if($valor_p!=0){
                $deteccion=(($valor_ultimo->value*100)/$valor_p)-100;
            }else{
                $deteccion = 0;
            }
        } catch (Throwable $e) {
            report($e);
            return "$e";
        }
        return $deteccion;
    }
    function cantidadU(){
        $usuarios=count(User::all());
        return $usuarios;
    }
    function cantidadLxmes($mes){
        $cantidad = count(Leakage::select('id')
        ->whereYear('created_at', '=', anioActual())
        ->whereMonth('created_at', '=', $mes)->get());
        return $cantidad;
    }
    function cantidadIxmes($mes){//Inutilizado
        $cantidad = count(Incident::select('id')
        ->whereYear('created_at', '=', anioActual())
        ->whereMonth('created_at', '=', $mes)
        ->get());
        return $cantidad;
    }
    function cantidadLectxmes($mes){//Valores de Lecturas por mes
        $cantidad = Reading::select('value')->
        where('unit', '=','L/min')->
        whereYear('date', '=', anioActual())
        ->whereMonth('date', '=', $mes);
        return $cantidad->avg('value');
    }
    function cantidadPxmes($mes){
        $cantidad = Leakage::select('stimad_less')
        ->whereYear('created_at', '=', anioActual())
        ->whereMonth('created_at', '=', $mes)->sum('stimad_less');
        return $cantidad;
    }
    function cantidadPrxmes($mes){
        $cantidad = Reading::select('value')->
        where('unit', '=','kPa')->
        whereYear('date', '=', anioActual())
        ->whereMonth('date', '=', $mes);
        return $cantidad->avg('value');
    }
    function cantidadValvula(){
        $cantidad = Reading::where('unit', '=', 'Vuelta')->sum('value');
        return $cantidad;
    }
    function graficoPeriodoP($mes1,$mes2){
        $suma=cantidadPxmes($mes1)+cantidadPxmes($mes2);
        return $suma;
    }
    function graficoPeriodoPr($mes1,$mes2){
        $suma=cantidadPrxmes($mes1)+cantidadPrxmes($mes2);
        return $suma;
    }
    function graficoPeriodoI($mes1,$mes2){//Inutilizado
        $suma=cantidadIxmes($mes1)+cantidadIxmes($mes2);
        return $suma;
    }
    function graficoPeriodoL($mes1,$mes2){
        $suma=(cantidadLectxmes($mes1)+cantidadLectxmes($mes2))/2;
        return $suma;
    }
    function graficoPeriodoF($mes1,$mes2){
        $suma=cantidadLxmes($mes1)+cantidadLxmes($mes2);
        return $suma;
    }
    function usuarioMenosYo(){//Muestra usuarios administradores menos uno mismo
        //$users= User::where('users.id','!=',Auth::id())->join('incidents', 'users.id', '=', 'incidents.fk_support')->select('users.name','users.created_at',
        //DB::raw('COUNT(incidents.fk_support) as cuenta'))
        //->groupBy('users.name','users.created_at')
        //->get();

        //$users= User::all()->except(Auth::id());

        $users= User::where('users.id','!=',Auth::id())->where('users.role','=',0)->select('users.name','users.created_at',
        'users.username')
        ->groupBy('users.name','users.created_at','users.username')
        ->get();

        return $users;
    }
    function trabajoXusuario($iduser){
        $resultado=count(Incident::where('fk_support','=',$iduser)->get());
    }
    function zonas(){
        $zonas= Pipeline::select("id","neighborhood","created_at")->distinct()->get();
        return $zonas;
    }
    function cantprediccion($zonas){
        $prediccion = count(DB::table('prediction')->where('fk_pipeline',$zonas->fk_pipeline)->get());
        return $prediccion;
    }
    function cantdeteccion($zonas){
        $deteccion = count(DB::table('detections')->where('neighborhood',$zonas->neighborhood)->get());
        return $deteccion;
    }
    function cantdeteccionAñoActual(){
        $añoActual=date('Y', strtotime('now'));
        $deteccion = count(DB::table('detections')->whereYear('created_at','=',$añoActual)->get());
        return $deteccion;
    }
    function cantfugaAñoActual(){
        $añoActual=date('Y', strtotime('now'));
        $deteccion = count(DB::table('leakages')->where('removed','=',0)
        ->whereYear('created_at','=',$añoActual)->get());
        return $deteccion;
    }
    function nivelxdeteccion($zona){
        //Si la zona tiene 10 detecciones entonces le sumo 0,2 (TOTAL DETECCIONES/10)*0,2
        $resultado = cantdeteccion($zona);
        return (($resultado/10)*0.2);
    }
    function nivelxfugareal($zona){
        //Por cada 2 fugas reales se suma 1 (TOTAL FUGAS REALES/2)
        $fugas = count(DB::table('leakages')
        ->join('pipelines','leakages.fk_pipeline','pipelines.id')
        ->where('pipelines.neighborhood',$zona->neighborhood)->get());
        return ($fugas/2);
    }
    function nivelxvariacionlect($zona){
        //Sacar todas las lecturas del barrio
        //sacar el minimo valor y el maximo
        //sacar diferencia
        $lecturamin=DB::table('readings')
        ->join('sensors','readings.fk_sensor','sensors.id')
        ->join('devices','sensors.fk_device','devices.id')
        ->join('pipelines','devices.fk_pipeline','pipelines.id')
        ->where('pipelines.neighborhood',$zona->neighborhood)->min('readings.value');
        $lecturamax=DB::table('readings')
        ->join('sensors','readings.fk_sensor','sensors.id')
        ->join('devices','sensors.fk_device','devices.id')
        ->join('pipelines','devices.fk_pipeline','pipelines.id')
        ->where('pipelines.neighborhood',$zona->neighborhood)->max('readings.value');
        return (($lecturamax-$lecturamin)/10)*0.1;
    }
    function nivelxtiempovida($zona){
        $tiempovida = DB::table('leakages')
        ->join('pipelines','leakages.fk_pipeline','pipelines.id')
        //->select('pipelines.life_time')
        ->where('pipelines.neighborhood',$zona->neighborhood)->avg('pipelines.life_time');
        return ($tiempovida*0.3);
    }
    function nivelzonariesgo(){//Da una calificacion de la zona: A,B,C,D segun cant de detecciones y fugas reales existentes
        //Obtener todas las zonas con mas detecciones -0.2 x cada 10
        $zona=zonas();
        $data=[];
        foreach ($zona as $zonas) {
            $data['barrio'][]=$zonas->neighborhood;
            
            $nivel=nivelxvariacionlect($zonas)+nivelxdeteccion($zonas)+nivelxfugareal($zonas)+nivelxtiempovida($zonas);
            if($nivel<3){
                $data['nivel'][]='C';
            }else{
                if($nivel<5){
                    $data['nivel'][]='B';
                }else{
                    $data['nivel'][]='A';
                }
            }
            
            
        }
        return $data;
        //Obtener todas las zonas con mas fugas reales -1 x cada 2
        //Obtener todas las zonas con mas variaciones de lectura -0.1 x cada 10
        //A menos lifetime mas calificacion 0,3 x cada año de vida
        //Asignar una calificacion: A la mas alta 5 o mas, B regular 3 a 5, C 1 a 3 Leve
    }
    function usuariosAdmin(){//Muestra usuarios administradores
        $users= User::where('users.role','=',1)->select('users.name','users.created_at',
        'users.username')
        ->groupBy('users.name','users.created_at','users.username')
        ->get();
        return $users;
    }
    function usuariosNoAdmin(){//Muestra usuarios NO administradores
        $users= User::where('users.role','=',0)->select('users.name','users.created_at',
        'users.username')
        ->groupBy('users.name','users.created_at','users.username')
        ->get();
        return $users;
    }
    function arrayTipoSensor(){//Obtiene array de tipo de sensores
        $sensores = DB::table('sensors')
        ->select(DB::raw("sum('type') as total, type as sensor"))
        ->groupBy('type')
        ->where('state','=','Funcionando')
        ->get();
        $data=[];
        $tipo=[];
        foreach ($sensores as $sensor) {
            $data['label'][]= $sensor->sensor;
            $data['data'][]= $sensor->total;
            $tipo[]= $sensor->sensor;
        }
        //$data['data']=json_encode($data);
        return $tipo;
    }
    function cantidadTipoSensor(){ //Obtiene aray de cantidad de tipo de sensores
        $sensores = DB::table('sensors')
        ->select(DB::raw("count(distinct 'type') as total"))
        ->groupBy('type')
        ->where('state','=','Funcionando')
        ->get();
        $data=[];
        $tipo=[];
        foreach ($sensores as $sensor) {
            
            $tipo[]= $sensor->total;
        }
        
        
        //$data['data']=json_encode($data);
        return $tipo;
    }
    function arrayTipoFuga(){//Obtiene array de tipo de fugas
        $fugas = DB::table('categories')
        ->select(DB::raw("name as categoria"))
        ->groupBy('name')
        ->where('removed','=',0)
        ->get();
        $data=[];
        foreach ($fugas as $fuga) {
            $data[]= $fuga->categoria;
        }
        return $data;
    }
    function cantidadTipoFuga(){ //Obtiene array de cantidad de tipo de fugas
        $fugas = DB::table('leakages')
        ->join('categories','leakages.fk_category','categories.id')
        ->select(DB::raw("count(distinct 'leakages.fk_category') as total"))
        ->groupBy('categories.name')
        ->where('categories.removed','=',0)
        ->get();
        $data=[];
        foreach ($fugas as $fuga) {
            $data[]= $fuga->total;
        }
        //------------------------------------
        $fugas = DB::table('leakages')
        ->join('categories', 'leakages.fk_category', '=', 'categories.id')
        ->select('categories.name', DB::raw('COUNT(*) as total'))
        ->groupBy('categories.name')
        ->where('leakages.removed', '=', 0)
        ->where('categories.removed','=',0)
        ->get();

$data = $fugas->pluck('total')->toArray();

// Si solo hay una categoría, devuelve un array con un solo elemento
if (count($data) === 1) {
    return [$data[0]];
}

return $data;

    }
    function mesesLecturas(){ //Obtiene array de meses del presente año de lecturas
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $date = Carbon::now();//FECHA ACTUAL
        $fecha = Carbon::parse($date);
        //
        $fecha1 =date("Y-m-d H:i:s", strtotime("-3 month"));
        $fecha2 =date("Y-m-d H:i:s", strtotime("-2 month"));
        $fecha3 =date("Y-m-d H:i:s", strtotime("-1 month"));
        $fecha4 =date("Y-m-d H:i:s", strtotime("now"));
        $date1 = Carbon::parse($fecha1);
        $date2 = Carbon::parse($fecha2);
        $date3 = Carbon::parse($fecha3);
        $date4 = Carbon::parse($fecha4);
        $mes1 = $meses[($date1->format('n')) - 1];//MES ACTUAL -3 EN NOMBRE
        $mes2 = $meses[($date2->format('n')) - 1];//MES ACTUAL -2 EN NOMBRE
        $mes3 = $meses[($date3->format('n')) - 1];//MES ACTUAL -1 EN NOMBRE
        $mes4 = $meses[($date4->format('n')) - 1];//MES ACTUAL  EN NOMBRE
        //
        $mes = $meses[($fecha->format('n')) - 1];//MES ACTUAL EN NOMBRE
        $mes_anterior = date('m', strtotime('-1 month'));
        $mesnumero = date('m', strtotime('now'));//MES ACTUAL EN NUMERO
        //return [$mesnumero-3,$mesnumero-2,$mesnumero-1,$mesnumero+0];
        return [$mes1,$mes2,$mes3,$mes4];
    }
    function cantidadLectura(){//Obtiene la cantidad de lecturas por mes
       
        // -------------------------------------------------------------
            // Obtener las fechas de los últimos 4 meses
            $fechaActual = Carbon::now();
            $ultimos4Meses = [];
            for ($i = 0; $i < 4; $i++) {
                $ultimos4Meses[] = $fechaActual->copy()->subMonths($i)->format('Y-m');
            }

            // Consulta para obtener el array con la cantidad de lecturas de los últimos 4 meses
            $lecturasUltimos4Meses = DB::table('readings')
                ->where('created_at', '>=', $fechaActual->copy()->subMonths(3)->startOfMonth())
                ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") AS month, COUNT(*) AS count')
                ->groupBy('month')
                ->pluck('count', 'month')
                ->toArray();

            // Completar el array con ceros para los meses sin registros
            $resultado = [];
            foreach ($ultimos4Meses as $mes) {
                $resultado[] = $lecturasUltimos4Meses[$mes] ?? 0;
            }

            // Ordenar el array en forma ascendente (mes más antiguo al presente)
            $resultado = array_reverse($resultado);

            // Resultado
                    //return [22.3,32.4,0.1,0.54];
                    return $resultado;
    }

    function pruebita($entrada){
        if($entrada != 0){
            return true;
        }
    }
    function detectarFugaDeAgua($giroValvula, $presion, $caudal)
{
    // Definir los valores límite
    $giroValvulaMinimo = 0;
    $giroValvulaMaximo = 0.5;
    $presionMinima = 0;
    $presionMaxima = 100;
    $caudalMinimo = 0;
    $caudalMaximo = 10;

    // Comprobar los valores límite
    $giroValvulaValido = ($giroValvula >= $giroValvulaMinimo) && ($giroValvula <= $giroValvulaMaximo);
    $presionValida = ($presion >= $presionMinima) && ($presion <= $presionMaxima);
    $caudalValido = ($caudal >= $caudalMinimo) && ($caudal <= $caudalMaximo);

    // Detectar la fuga de agua
    $fugaDeAgua = $giroValvulaValido && $presionValida && $caudalValido;

    return $fugaDeAgua;
}

function enviarNotificacion($cantidadFuga){
    if($cantidadFuga > 0){
        return true;
    }else{
    return false;
    }
}