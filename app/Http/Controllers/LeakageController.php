<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leakage;
use App\Models\Category;
use App\Models\Pipeline;
use Illuminate\Support\Facades\DB;
class LeakageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $leakages=DB::table('leakages')
        ->select('leakages.id', 'leakages.stimad_less', 'leakages.cause','leakages.datetime')
        ->get();
        return view('leakages.index',compact('leakages'));
    }

    
    public function create(){
        $categories=Category::all();
        $pipelines=Pipeline::all();
        return view('leakages.create',compact('categories','pipelines'));
    }

    
    public function store(Request $request){
        $rules=[
            'details'=>'required',
            'fk_category'=>'required',
            'fk_pipeline'=>'required',
        ];
        $message=[
                'details.required'=>'Es necesario ingresar una descripcion',
                'fk_category.required'=>'Es necesario ingresar una categoria valida',
                'fk_pipeline.integer'=>'Seleccione una tuberia valida',
        ];
        $this->validate($request,$rules,$message);
        Leakage::create($request->only('stimad_less','datetime','cause','details',
        'fk_category','fk_pipeline')
        );
        return redirect ()-> route('leakages.index')->with('success','Fuga guardada con exito');
    }

    public function show($id){
        //
    }

    public function edit($id){
        //
    }
    public function update(Request $request, $id){
        //
    }
    public function destroy($id){
        $fuga= Leakage::find($id);
        $fuga->delete();
        return redirect ()-> route('leakages.index')->with('notification','Registro de Fuga eliminado con éxito');
    }
}
