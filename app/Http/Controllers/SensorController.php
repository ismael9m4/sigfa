<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sensor;
use App\Models\Device;
use Illuminate\Support\Facades\DB;
class SensorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $sensors=DB::table('devices')
            ->join('sensors', 'sensors.fk_device', '=', 'devices.id')
            ->select('sensors.id', 'sensors.state', 'sensors.type','sensors.condition_sensor','devices.serie')
            ->get();
        return view('sensors.index',compact('sensors'));
    }
    public function create(){
        $devices=Device::all();
        return view('sensors.create',compact('devices'));
        
    }
    public function store(Request $request){
        $rules=[
            'state'=>'required',
            'condition_sensor'=>'required',
            'type'=>'required',
            'description'=>'required',
            'fk_device'=>'required',
        ];
        $message=[
                'state.required'=>'Es necesario ingresar un estado',
                'condition_sensor.required'=>'Es necesario ingresar la condicion del sensor',
                'description.required'=>'Es necesario ingresar una descripcion',
                'type.required'=>'Ingrese un tipo valido',
                'fk_device.required'=>'Seleccione un dispositivo',
        ];
        $this->validate($request,$rules,$message);

        Sensor::create($request->only('state','condition_sensor','type','description','fk_device'));
        return redirect ()-> route('sensors.index')->with('notification','Dispositivo creado con exito');
    }
    public function show($id){
        $sensor=Sensor::findOrFail($id);
        return view('sensors.show',compact('sensor'));
    }
    public function edit($id){
        $sensor=Sensor::findOrFail($id);
        $devices=Device::all();
        return view('sensors.edit',compact('sensor','devices'));
    }
    public function update(Request $request, $id){
        $sensor=Sensor::findOrFail($id);
        $sensor->state=$request->get('state');
        $sensor->condition_sensor=$request->get('condition_sensor');
        $sensor->type=$request->get('type');
        $sensor->description=$request->get('description');
        $sensor->fk_device=$request->get('fk_device');
        $sensor->save();
        return redirect ()-> route('sensors.index')->with('notification','Sensor modificado con exito');
    }
    public function destroy($id){
        $sensor= Sensor::find($id);
        $sensor->delete();
        return redirect ()-> route('sensors.index')->with('notification','Sensor eliminado con éxito');
    }
    public function getDevices(){
    
    }

}
