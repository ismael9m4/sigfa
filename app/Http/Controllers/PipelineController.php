<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pipeline;
use Illuminate\Support\Facades\DB;
class PipelineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $pipelines=DB::table('pipelines')
        //$devices=DB::table('device_sensor')
            //->join('devices', 'device_sensor.fk_device', '=', 'devices.id')
            //->join('sensors', 'device_sensor.fk_sensor', '=', 'sensors.id')
            ->select('pipelines.id', 'pipelines.positiong', 'pipelines.diameter','pipelines.length')
            ->get();
        return view('pipelines.index',compact('pipelines'));
    }
    public function create(){
        $paises = array("Afganistán","Albania","Alemania","Andorra","Angola","Antigua y Barbuda","Arabia Saudita","Argelia","Argentina","Armenia","Australia","Austria","Azerbaiyán","Bahamas","Bangladés","Barbados","Baréin","Bélgica","Belice","Benín","Bielorrusia","Birmania","Bolivia","Bosnia y Herzegovina","Botsuana","Brasil","Brunéi","Bulgaria","Burkina Faso","Burundi","Bután","Cabo Verde","Camboya","Camerún","Canadá","Catar","Chad","Chile","China","Chipre","Ciudad del Vaticano","Colombia","Comoras","Corea del Norte","Corea del Sur","Costa de Marfil","Costa Rica","Croacia","Cuba","Dinamarca","Dominica","Ecuador","Egipto","El Salvador","Emiratos Árabes Unidos","Eritrea","Eslovaquia","Eslovenia","España","Estados Unidos","Estonia","Etiopía","Filipinas","Finlandia","Fiyi","Francia","Gabón","Gambia","Georgia","Ghana","Granada","Grecia","Guatemala","Guyana","Guinea","Guinea ecuatorial","Guinea-Bisáu","Haití","Honduras","Hungría","India","Indonesia","Irak","Irán","Irlanda","Islandia","Islas Marshall","Islas Salomón","Israel","Italia","Jamaica","Japón","Jordania","Kazajistán","Kenia","Kirguistán","Kiribati","Kuwait","Laos","Lesoto","Letonia","Líbano","Liberia","Libia","Liechtenstein","Lituania","Luxemburgo","Madagascar","Malasia","Malaui","Maldivas","Malí","Malta","Marruecos","Mauricio","Mauritania","México","Micronesia","Moldavia","Mónaco","Mongolia","Montenegro","Mozambique","Namibia","Nauru","Nepal","Nicaragua","Níger","Nigeria","Noruega","Nueva Zelanda","Omán","Países Bajos","Pakistán","Palaos","Panamá","Papúa Nueva Guinea","Paraguay","Perú","Polonia","Portugal","Reino Unido","República Centroafricana","República Checa","República de Macedonia","República del Congo","República Democrática del Congo","República Dominicana","República Sudafricana","Ruanda","Rumanía","Rusia","Samoa","San Cristóbal y Nieves","San Marino","San Vicente y las Granadinas","Santa Lucía","Santo Tomé y Príncipe","Senegal","Serbia","Seychelles","Sierra Leona","Singapur","Siria","Somalia","Sri Lanka","Suazilandia","Sudán","Sudán del Sur","Suecia","Suiza","Surinam","Tailandia","Tanzania","Tayikistán","Timor Oriental","Togo","Tonga","Trinidad y Tobago","Túnez","Turkmenistán","Turquía","Tuvalu","Ucrania","Uganda","Uruguay","Uzbekistán","Vanuatu","Venezuela","Vietnam","Yemen","Yibuti","Zambia","Zimbabue");
        $provincias = array("Misiones","San Luis","San Juan","Entre Rios","Santa Cruz","Rio Negro","Chubut","Cordoba","Mendoza","La Rioja","Catamarca","La Pampa","Santiago del Estero","Corrientes",
        "Santa Fe","Tucuman","Neuquen","Salta","Chaco","Formosa","Jujuy","Ciudad Autonoma de Buenos Aires","Buenos Aires","Tierra del Fuego");
        $localidades=array("San Salvador de Jujuy","V. J. de Reyes","Lozano","Perico","Yala");
        $barrios=array("Reyes","Huaico","Guerrero","Termas de Reyes");
        $distritos=array("A-Las Peras","A-Finca El Obispo","A-Alto Reyes","A-Reyes","A-Asent. 25 de Mayo");
        $materiales=array("PVC","Cobre","Plomo","Galvanizado");
        $coberturas=array("Pavimento","Arena","Agua","Tierra Blanda","Ripio");
        return view('pipelines.create')->with(compact('paises','provincias','localidades','barrios','distritos','materiales','coberturas'));
    }
    public function store(Request $request){
        $rules=[
            'positiong'=>'required',
            'diameter'=>'required',
            'thickness'=>'required',
            'length'=>'required',
            'depth_earth'=>'required',
            'life_time'=>'required',
        ];

        $message=[
            'positiong.required'=>'Es necesario ingresar una ubicacion',
            'diameter.required'=>'Es necesario ingresar una descripcion',
            'thickness.required'=>'Es necesario ingresar un valor de espesor valido',
            'length.required'=>'Es necesario ingresar un valor de longitud valido',
            'depth_earth.required'=>'Es necesario ingresar un valor de profundidad valido',
            'life_time.required'=>'Es necesario ingresar un valor de tiempo de vida valido',
        ];
        $this->validate($request,$rules,$message);

        Pipeline::create($request->only('positiong','country','province','location','neighborhood','district','material','diameter','thickness','length','depth_earth','type_cover','life_time'));
        return redirect ()-> route('pipelines.index')->with('success','Dispositivo creado con exito');
    }
    public function show($id){
        $pipeline=Pipeline::findOrFail($id);
        return view('pipelines.show',compact('pipeline'));
    }

    public function edit($id){
        $pipeline=Pipeline::find($id);
        $paises = array("Afganistán","Albania","Alemania","Andorra","Angola","Antigua y Barbuda","Arabia Saudita","Argelia","Argentina","Armenia","Australia","Austria","Azerbaiyán","Bahamas","Bangladés","Barbados","Baréin","Bélgica","Belice","Benín","Bielorrusia","Birmania","Bolivia","Bosnia y Herzegovina","Botsuana","Brasil","Brunéi","Bulgaria","Burkina Faso","Burundi","Bután","Cabo Verde","Camboya","Camerún","Canadá","Catar","Chad","Chile","China","Chipre","Ciudad del Vaticano","Colombia","Comoras","Corea del Norte","Corea del Sur","Costa de Marfil","Costa Rica","Croacia","Cuba","Dinamarca","Dominica","Ecuador","Egipto","El Salvador","Emiratos Árabes Unidos","Eritrea","Eslovaquia","Eslovenia","España","Estados Unidos","Estonia","Etiopía","Filipinas","Finlandia","Fiyi","Francia","Gabón","Gambia","Georgia","Ghana","Granada","Grecia","Guatemala","Guyana","Guinea","Guinea ecuatorial","Guinea-Bisáu","Haití","Honduras","Hungría","India","Indonesia","Irak","Irán","Irlanda","Islandia","Islas Marshall","Islas Salomón","Israel","Italia","Jamaica","Japón","Jordania","Kazajistán","Kenia","Kirguistán","Kiribati","Kuwait","Laos","Lesoto","Letonia","Líbano","Liberia","Libia","Liechtenstein","Lituania","Luxemburgo","Madagascar","Malasia","Malaui","Maldivas","Malí","Malta","Marruecos","Mauricio","Mauritania","México","Micronesia","Moldavia","Mónaco","Mongolia","Montenegro","Mozambique","Namibia","Nauru","Nepal","Nicaragua","Níger","Nigeria","Noruega","Nueva Zelanda","Omán","Países Bajos","Pakistán","Palaos","Panamá","Papúa Nueva Guinea","Paraguay","Perú","Polonia","Portugal","Reino Unido","República Centroafricana","República Checa","República de Macedonia","República del Congo","República Democrática del Congo","República Dominicana","República Sudafricana","Ruanda","Rumanía","Rusia","Samoa","San Cristóbal y Nieves","San Marino","San Vicente y las Granadinas","Santa Lucía","Santo Tomé y Príncipe","Senegal","Serbia","Seychelles","Sierra Leona","Singapur","Siria","Somalia","Sri Lanka","Suazilandia","Sudán","Sudán del Sur","Suecia","Suiza","Surinam","Tailandia","Tanzania","Tayikistán","Timor Oriental","Togo","Tonga","Trinidad y Tobago","Túnez","Turkmenistán","Turquía","Tuvalu","Ucrania","Uganda","Uruguay","Uzbekistán","Vanuatu","Venezuela","Vietnam","Yemen","Yibuti","Zambia","Zimbabue");
        $provincias = array("Misiones","San Luis","San Juan","Entre Rios","Santa Cruz","Rio Negro","Chubut","Cordoba","Mendoza","La Rioja","Catamarca","La Pampa","Santiago del Estero","Corrientes",
        "Santa Fe","Tucuman","Neuquen","Salta","Chaco","Formosa","Jujuy","Ciudad Autonoma de Buenos Aires","Buenos Aires","Tierra del Fuego");
        $localidades=array("San Salvador de Jujuy","V. J. de Reyes","Lozano","Perico","Yala");
        $barrios=array("Reyes","Huaico","Guerrero","Termas de Reyes");
        $distritos=array("A-Las Peras","A-Finca El Obispo","A-Alto Reyes","A-Reyes","A-Asent. 25 de Mayo");
        $materiales=array("PVC","Cobre","Plomo","Galvanizado");
        $coberturas=array("Pavimento","Arena","Agua","Tierra Blanda","Ripio");
        return view('pipelines.edit',compact('pipeline','paises','provincias','localidades','barrios','distritos','materiales','coberturas'));
    }
    public function update(Request $request, $id){
        $pipeline=Pipeline::find($id);
        $pipeline->positiong=$request->get('positiong');
        $pipeline->country=$request->get('country');
        $pipeline->province=$request->get('province');
        $pipeline->location=$request->get('location');
        $pipeline->neighborhood=$request->get('neighborhood');
        $pipeline->district=$request->get('district');
        $pipeline->material=$request->get('material');
        $pipeline->diameter=$request->get('diameter');
        $pipeline->thickness=$request->get('thickness');
        $pipeline->length=$request->get('length');
        $pipeline->depth_earth=$request->get('depth_earth');
        $pipeline->type_cover=$request->get('type_cover');
        $pipeline->life_time=$request->get('life_time');
        $pipeline->save();
        return redirect ()-> route('pipelines.index')->with('notification','Tuberia modificado con exito');
    }
    public function destroy($id){
        $pipeline= Pipeline::findOrFail($id);
        $pipeline->delete();
        return redirect ()-> route('pipelines.index')->with('notification','Tuberia eliminada con éxito');
    }
}
