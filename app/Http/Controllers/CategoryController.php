<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pipeline;
use App\Models\Category;
class CategoryController extends Controller
{
    
    public function index()
    {
        $categories=DB::table('categories')
        //$devices=DB::table('device_sensor')
            //->join('devices', 'device_sensor.fk_device', '=', 'devices.id')
            //->join('sensors', 'device_sensor.fk_sensor', '=', 'sensors.id')
            ->select('categories.id', 'categories.name')
            ->get();
        return view('categories.index',compact('categories'));
    }
    public function create(){
        return view('categories.create');
    }
    public function store(Request $request){
        Category::create($request->only('name','details'));
        return redirect ()-> route('categories.index')->with('notification','Categoria creada con exito');
    }
    public function show($id){
        $category=Category::findOrFail($id);
        return view('categories.show',compact('category'));
    }
    public function edit($id){
        $category=Category::findOrFail($id);
        return view('categories.edit',compact('category'));
    }
    public function update(Request $request, $id){
        $category=Category::findOrFail($id);
        $category->name=$request->get('name');
        $category->details=$request->get('details');
        $category->save();
        return redirect ()-> route('categories.index')->with('notification','Categoria modificada con exito');
    }
    public function destroy($id){
        $categories= Category::findOrFail($id);
        $categories->delete();
        return redirect ()-> route('categories.index')->with('notification','Categoria eliminada con éxito');
    }
}
