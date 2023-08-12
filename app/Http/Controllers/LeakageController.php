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
        ->where('removed', '0')
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
        return redirect()->route('leakages.index')->with('notification','Fuga creada con exito');
    }

    public function show($id){
        $leakage=Leakage::findOrFail($id);
        return view('leakages.show',compact('leakage'));
    }

    public function edit($id){
        $categories=Category::all();
        $leakage=Leakage::find($id);
        $pipelines=Pipeline::all();
        return view('leakages.edit',compact('categories','leakage','pipelines'));
    }
    public function update(Request $request, $id){
        $leakage=Leakage::find($id);
        $leakage->fk_category=$request->get('fk_category');
        $leakage->cause=$request->get('cause');
        $leakage->stimad_less=$request->get('stimad_less');
        $leakage->details=$request->get('details');
        $leakage->datetime=$request->get('datetime');
        $leakage->fk_pipeline=$request->get('fk_pipeline');
        $leakage->save();
        return redirect()->route('leakages.index')->with('notification','Fuga modificada con exito');
    }
    public function destroy($id){
        $fuga= Leakage::find($id);
        $fuga->delete();
        return redirect ()-> route('leakages.index')->with('notification','Registro de Fuga eliminado con éxito');
    }
}
