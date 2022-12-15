<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\Pipeline;
use Illuminate\Support\Facades\DB;
class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        //$devices=Device::paginate(5);
        $devices=DB::table('devices')
        //$devices=DB::table('device_sensor')
            //->join('devices', 'device_sensor.fk_device', '=', 'devices.id')
            //->join('sensors', 'device_sensor.fk_sensor', '=', 'sensors.id')
            ->select('devices.id', 'devices.serie', 'devices.details')
            ->get();
        return view('devices.index',compact('devices'));
    }
    public function create(){
        $tuberias= Pipeline::all();
        return view('devices.create')->with(compact('tuberias'));
    }
    public function store(Request $request){
        $rules=[
            'serie'=>'required',
            'details'=>'required',
            'fk_pipeline'=>'required'
            ,
        ];
        $message=[
            'serie.required'=>'Es necesario ingresar un código de serie',
            'details.required'=>'Es necesario ingresar una descripcion',
            'fk_pipeline'=>'Seleccione una tuberia',
        ];
        //$this->validate($request,$rules,$message);
        Device::create($request->only('id','serie','details','fk_pipeline'));
        return redirect ()-> route('devices.index')->with('notification','Dispositivo creado con exito');
    }
    public function show($id){
        $device=Device::findOrFail($id);
        return view('devices.show',compact('device'));
    }
    public function edit($id){
        $device=Device::find($id);
        $tuberias= Pipeline::all();
        return view('devices.edit',compact('device','tuberias'));
    }
    public function update(Request $request, $id){
        $device=Device::find($id);
        $device->serie=$request->get('serie');
        $device->details=$request->get('details');
        $device->fk_pipeline=$request->get('fk_pipeline');
        $device->save();
        return redirect ()-> route('devices.index')->with('notification','Dispositivo modificado con exito');
    }
    public function destroy($id){
        $devices= Device::find($id);
        $devices->delete();
        return redirect ()-> route('devices.index')->with('notification','Dispositivo eliminado con éxito');
    }
}
